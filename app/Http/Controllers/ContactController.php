<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Contact;
use App\User;

class ContactController extends Controller
{

    public function addEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'nullable|email|unique:users|max:191',
        ]);

        $newEmail = User::find($request->input('user_id'));
        $newEmail->email = htmlspecialchars($request->input('email'));
        $newEmail->save();

        return redirect()->route('profile', [$request->input('user_id')]);
    }

    public function addContact(Request $request)
    {

        $this->validate($request, [
            'github' => 'nullable|unique:contacts|url',
            'facebook' => 'nullable|unique:contacts|url',
            'skype' => 'nullable|string|unique:contacts',
            'google_plus' => 'nullable|unique:contacts|url',
            'phone' => 'nullable|string',
            'portfolio' => 'nullable|unique:contacts|url',
        ]);

//        $contact = Contact::where('user_id', '=', $request->input('user_id'))->first();
//        if($contact != null) {
//            $contact->github = 'New Flight Name';
//            $contact->facebook = 'New Flight Name';
//            $contact->skype = 'sdfdfdfg';
//            $contact->google_plus = 'New Flight Name';
//            $contact->phone = 'New Flight Name';
//            $contact->portfolio = 'New Flight Name';
//            $contact->save();
//        } else {
//            $newContact = new Contact;
//            $newContact->user_id = $request->input('user_id');
//            $newContact->github = htmlspecialchars($request->input('github'));
//            $newContact->facebook = htmlspecialchars($request->input('facebook'));
//            $newContact->skype = htmlspecialchars($request->input('skype'));
//            $newContact->google_plus = htmlspecialchars($request->input('google_plus'));
//            $newContact->phone = htmlspecialchars($request->input('phone'));
//            $newContact->portfolio = htmlspecialchars($request->input('portfolio'));
//            $newContact->save();
//        }

        Contact::updateOrCreate(
            ['user_id' => $request->input('user_id')],
            [
            'github' =>  htmlspecialchars($request->input('github')),
            'facebook' => htmlspecialchars($request->input('facebook')),
            'skype' => htmlspecialchars($request->input('skype')),
            'google_plus' => htmlspecialchars($request->input('google_plus')),
            'phone' =>  htmlspecialchars($request->input('phone')),
            'portfolio' =>  htmlspecialchars($request->input('portfolio')),
            ]
        );

        return redirect()->route('profile', [$request->input('user_id')]);
    }
}
