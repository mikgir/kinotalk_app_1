<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Events\BecomeAuthor as BecomeAuthorEvent;

class MailController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function sendEmailBecomeAuthor(Request $request)
    {
        $user = $this->userRepository->getOne($request->id);
        event(new BecomeAuthorEvent($user));

        return redirect('profile');
    }
}
