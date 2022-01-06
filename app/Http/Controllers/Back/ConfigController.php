<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ConfigController extends Controller
{
    public function index() {

        $config = Config::find(1);
        return view('back.config.index', compact('config'));
    }

    public function deleteLogo() {
        $config = Config::find(1);
        if(File::exists($config->logo)) {
            File::delete(public_path($config->logo));
        }
        $config->logo = null;
        $config->save();
        toastr()->success('Logo Silindi', "Başarılı");
        return redirect()->route('admin.config.index');
    }

    public function deleteFavicon() {
        $config = Config::find(1);
        if(File::exists($config->favicon)) {
            File::delete(public_path($config->favicon));
        }
        $config->favicon = null;
        $config->save();
        toastr()->success('Favicon Silindi', "Başarılı");
        return redirect()->route('admin.config.index');
    }

    public function update(Request $request) { //45.05

        $config = Config::find(1);
        $config->title = $request->title;
        $config->active = $request->active;
        $config->facebook = $request->facebook;
        $config->twitter = $request->twitter;
        $config->instagram = $request->instagram;
        $config->linkedin = $request->linkedin;
        $config->github = $request->github;
        $config->youtube = $request->youtube;

        if($request->hasFile('logo')) {
            $logo = Str::slug($request->title, '-').'-logo.'.$request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('uploads'), $logo);
            $config->logo = 'uploads/'.$logo;
        }

        if($request->hasFile('favicon')) {
            $favicon = Str::slug($request->title, '-').'-favicon.'.$request->favicon->getClientOriginalExtension();
            $request->favicon->move(public_path('uploads'), $favicon);
            $config->favicon = 'uploads/'.$favicon;
        }
        $config->save();
        toastr()->success('Ayarlar Güncellendi.', 'Başarılı');


        return redirect()->back();
    }
}
