<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index() {
        $users = Admin::orderBy('id', 'DESC')->get();
        return view('back.user.index', compact('users'));
    }

    public function create() {
        return view('back.user.create');
    }

    public function update($id) {
        $admin = Admin::findOrFail($id);
        return view('back.adminUpdate', compact('admin'));
    }

    public function post(Request $request) {

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->timestamps = false;
        $admin->save();
        toastr()->success('Kullanıcı Oluşturuldu!', 'Başarılı');
        return redirect()->route('admin.user.index');
    }

    public function updatePost(Request $request, $id) {
        //dd($request);

        $request->validate([
            'name' => 'min:3',
            'email' => 'email',
            'password' => 'min:3',
        ]);

        $admin = Admin::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->timestamps = false;
        $admin->save();
        toastr()->success('Bilgileriniz güncellendi!', 'Başarılı');
        return redirect()->route('admin.dashboard');
    }

    public function authority(Request $request) {
        $admin = Admin::findOrFail($request->id);
        $admin->authority = $request->authority == "true" ? '1' : '0';
        $admin->timestamps = false;
        $admin->save();
    }

    public function switch(Request $request) {
        $admin = Admin::findOrFail($request->id);
        $admin->status = $request->statu=="true" ? '1' : '0';
        $admin->timestamps = false;
        $admin->save();
    }

    public function delete($id) {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        toastr()->success('Kullanıcı Silindi', 'Başarılı');
        return redirect()->route('admin.user.index');
    }
}
