<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index() {
        $pages = Page::orderBy('order', 'ASC')->get();
        return view('back.pages.index', compact('pages'));
    }

    public function orders(Request $request) {
        //print_r($request->get('orders'));
        foreach($request->get('page') as $key => $order) {
            Page::where('id', $order)->update(['order'=>$key]);
        }

    }

    public function create() {
        $pages = Page::orderBy('order', 'ASC')->get();
        return view('back.pages.create', compact('pages'));
    }

    public function update($id) {
        $pages = Page::findOrFail($id);
        $pagess = Page::orderBy('order', 'ASC')->get();
        return view('back.pages.update', compact('pages', 'pagess'));
    }

    public function delete($id) {
        $pages = Page::findOrFail($id);
        if(File::exists(public_path().$pages->image)) {
            File::delete(public_path($pages->image));
        }
        $pages->delete();
        toastr()->success('Sayfa Silindi', 'Başarılı');
        return redirect()->route('admin.page.index');
    }

    public function updatePost(Request $request, $id) {
        if($request->orderselect == 0) {
            $pageorder = 1;
        }
        else {
            $po = Page::findOrFail($request->orderselect);
            $pageorder = $po->order+1;
        }
        $pagesupdate = Page::all();
        foreach($pagesupdate as $pageupdate) {
            if($pageupdate->order >= $pageorder) {
                $pageupdate->order = $pageupdate->order+1;
                $pageupdate->save();
            }
        }
        $request->validate([
            'title' => 'min:3',
            'image' => ' image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $page = Page::findOrFail($id);
        $page->title = $request->title;
        $page->content = $request->content;
        $page->order = $pageorder;
        $page->slug = Str::slug($request->title, '-');

        if($request->hasFile('image')) {
            $imageName = Str::slug($request->title, '-').'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'), $imageName);
            $page->image = '/uploads/'.$imageName;
        }
        $page->save();
        toastr()->success('Sayfa Güncellendi!', 'Başarılı');
        return redirect()->route('admin.page.index');
    }

    public function post(Request $request) {
        if($request->orderselect == 0) {
            $pageorder = 1;
        }
        else {
            $po = Page::findOrFail($request->orderselect);
            $pageorder = $po->order+1; //5+1=6
        }
        $pagesupdate = Page::all();
        foreach($pagesupdate as $pageupdate) {
            if($pageupdate->order >= $pageorder) { // 5>=5
                $pageupdate->order = $pageupdate->order+1;
                $pageupdate->save();
            }
        }

        $request->validate([
            'title' => 'min:3',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'content' => 'required',
        ]);

        $last = Page::orderBy('order', 'desc')->first();

        $page = new Page();
        $page->title = $request->title;
        $page->content = $request->content;
        //$page->order = $last->order+1;
        $page->order = $pageorder;
        $page->slug = Str::slug($request->title, '-');

        if($request->hasFile('image')) {
            $imageName = Str::slug($request->title, '-').'.'.$request->image->getClientOriginalExtension();
            //dd($imageName);
            $request->image->move(public_path('uploads'), $imageName);
            $page->image = '/uploads/'.$imageName;
        }
        $page->save();
        toastr()->success('Sayfa Oluşturuldu!', 'Başarılı');
        return redirect()->route('admin.page.index');
        return view('back.pages.create');
    }

    public function switch(Request $request) {
        $page = Page::findOrFail($request->id);
        $page->status=$request->statu=="true" ? '1' : '0';
        $page->save();
        //return $request->id;
    }
}
