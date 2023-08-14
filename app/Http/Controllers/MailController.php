<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Mail\MailContact;
use App\Models\ContactModel;
use App\Models\User;
use App\Notifications\ContactNotifcation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function contact(ContactModel $contact, MailRequest $request) {
       $user = User::first();
       $user->notify(new ContactNotifcation($contact, $request->validated()));
        return back()->with("success", "Votre Mail à été envoyez avec succes");

    }
}
