<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $messages = Contact::orderBy('created_at', 'DESC')->get();
        return view('back.messages.index', compact('messages'));
    }

    public function read($id) {
        $message = Contact::findOrFail($id);
        if($message->read == 0) {
            $message->read = 1;
            $message->save();
        }
        return view('back.messages.read', compact('message'));
    }

    public function delete($id) {
        $message = Contact::findOrFail($id);
        $message->delete();
        toastr()->success('Mesaj silindi.', 'Başarılı');
        return redirect()->route('admin.contact.index');
    }
}
