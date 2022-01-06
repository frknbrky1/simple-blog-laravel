<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'DESC')->get();
        //$articles i aşağıda compact içinde gönderiyoruz
        return view('back.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        /*$categories2 = Category::all();
        return view('back.articles.create', compact('categories', 'categories2'));*/
        return view('back.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->post());

        $request->validate([
            'title' => 'min:3',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'content' => 'required',
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->category_id = $request->category;
        $article->content = $request->content;
        $article->slug = Str::slug($request->title, '-');

        if($request->hasFile('image')) {
            $imageName = Str::slug($request->title, '-').'.'.$request->image->getClientOriginalExtension();
            //dd($imageName);
            $request->image->move(public_path('uploads'), $imageName);
            $article->image = '/uploads/'.$imageName;
        }
        $article->save();
        toastr()->success('Makale Başarıyla oluşturuldu!', 'Başarılı');
        return redirect()->route('admin.makaleler.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id.'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id); //eğer öyle bir id yoksa 404

        //$makale = Article::find($id);
        //dd($makale);

        $categories = Category::all();
        return view('back.articles.update', compact('categories', 'article'));
        //return $id.'edit';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'min:3',
            'image' => ' image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $article = Article::findOrFail($id);
        $article->title = $request->title;
        $article->category_id = $request->category;
        $article->content = $request->content;
        $article->slug = Str::slug($request->title, '-');

        if($request->hasFile('image')) {
            $imageName = Str::slug($request->title, '-').'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'), $imageName);
            $article->image = '/uploads/'.$imageName;
        }
        $article->save();
        toastr()->success('Makale Başarıyla güncellendi!', 'Başarılı');
        return redirect()->route('admin.makaleler.index');
    }

    public function switch(Request $request) {
        $article = Article::findOrFail($request->id);
        $article->status=$request->statu=="true" ? '1' : '0';
        $article->save();
        //return $request->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id) {
        Article::findOrFail($id)->delete();
        toastr()->success('Makale Silindi', 'Başarılı');
        return redirect()->route('admin.makaleler.index');
    }

    public function trashed() {
        $articles = Article::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();
        return view('back.articles.trashed', compact('articles'));
    }

    public function recover($id) {
        Article::onlyTrashed()->find($id)->restore();
        toastr()->success('Makale Kurtarıldı', 'Başarılı');
        //return redirect()->route('admin.makaleler.index');
        return redirect()->back();
    }

    public function hardDelete($id) {
        $article = Article::onlyTrashed()->findOrFail($id);
        if(File::exists(public_path().$article->image)) {
            File::delete(public_path($article->image));
        }
        $article->forceDelete();
        //Article::onlyTrashed()->findOrFail($id)->forceDelete();
        toastr()->success('Makale Tamamen Silindi', 'Başarılı');
        return redirect()->route('admin.makaleler.index');
    }

}
