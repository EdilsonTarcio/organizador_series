<?php

namespace App\Listeners;

use App\Events\SeriesCreated as EventsSeriesCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\SeriesCreated;


class EmailUsersAboutSeriesCreated implements ShouldQueue
{
    /** ShouldQueue -> está sendo executado de forma assíncrono
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(EventsSeriesCreated $event): void
    {
        
        //enviando para todos os usuarios com uma data definida e um delay definido na aplicação
        $userList = User::all();
        foreach ($userList as $index => $user) {
            $email = new SeriesCreated(
                $event->nomeSerie,
                $event->idSerie
            );
            $tempo = now()->addSeconds($index * 3);
            Mail::to($user)->later($tempo, $email);
        }
    }
}
