<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Mail\BecomeAuthor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Events\BecomeAuthor as BecomeAuthorEvent;

class MailController extends Controller
{
    public function sendEmailBecomeAuthor(Request $request)
    {
        $user = User::findOrFail($request->id);
        event(new BecomeAuthorEvent($user));

        return redirect('profile');
    }
}
