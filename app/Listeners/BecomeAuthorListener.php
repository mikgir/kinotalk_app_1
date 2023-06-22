<?php

namespace App\Listeners;

use App\Events\BecomeAuthor;
use App\Mail\BecomeAuthor as BecomeAuthorMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use MoonShine\Notifications\MoonShineNotification;

class BecomeAuthorListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BecomeAuthor $event): void
    {

        // автоматическое присвоение роли "автор"
        if ($event->user->hasRole('user') && $event->user->hasRole('moderator')) {
            $event->user->assignRole(['user', 'moderator', 'author']);
        }
        $event->user->assignRole(['user', 'author']);

        //отправляем письмо на почту
        Mail::to('kinotalkapp@gmail.com')->send(new BecomeAuthorMail($event->user));

        //отправляем уведомление в личный кабинет администратора
        MoonShineNotification::send(
            message: 'Пользователь ' . $event->user->name . ' стал автором',
            // Опционально button
            button: ['link' => route('moonshine.users.show', ['resourceItem' => $event->user->id]), 'label' => 'К профилю пользователя'],
            // Опционально id администраторов (по умолчанию всем)
            ids: [1]
        );
    }
}
