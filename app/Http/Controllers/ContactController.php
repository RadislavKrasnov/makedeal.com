<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function addContact(Request $request)
    {

        $this->validate($request, [
            'email' => 'nullable|email|unique:contacts|max:255',
            'github' => 'nullable||unique:contacts|url',
            'facebook' =>'nullable|unique:contacts|url',
            'skype' => 'nullable|string|unique:contacts',
            'google_plus' => 'nullable|unique:contacts|url',
            'phone' => 'nullable|string',
            'portfolio' => 'nullable|unique:contacts|url',
        ]);

        $newContact = new Contact;
        $newContact->user_id = $request->input('user_id');
        $newContact->email = htmlspecialchars($request->input('email'));
        $newContact->github = htmlspecialchars($request->input('github'));
        $newContact->facebook = htmlspecialchars($request->input('facebook'));
        $newContact->skype = htmlspecialchars($request->input('skype'));
        $newContact->google_plus = htmlspecialchars($request->input('google_plus'));
        $newContact->phone = htmlspecialchars($request->input('phone'));
        $newContact->portfolio = htmlspecialchars($request->input('portfolio'));
        $newContact->save();
        return redirect()->route('profile', [$newContact->user_id]);
    }
}
