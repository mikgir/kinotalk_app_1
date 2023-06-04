<?php

namespace App\Listeners;

use App\Events\CallModerator;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use MoonShine\Notifications\MoonShineNotification;

class CallModeratorListener
{
    /**
     * Create the event listener.
     */
    public function __construct(public UserRepository $userRepository)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CallModerator $event): void
    {
        $ids = $this->userRepository->getModeratorIds();

        //отправляем уведомление в личный кабинет администратора
        MoonShineNotification::send(
            message: 'Призыв модератора',
            // Опционально button
            button: ['link' => route('moonshine.comments.show', ['resourceItem' => $event->comment->id]), 'label' => 'К комментарию'],
            // Опционально id модераторов (по умолчанию всем)
            ids: $ids
        );
    }
}
