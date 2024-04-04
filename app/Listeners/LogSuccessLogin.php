<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\LogActivity;

class LogSuccessLogin
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
    public function handle(Login $event): void
    {
        $user = $event->user->id;
        $activity = 'Berhasil Login Dengan IP';
        LogActivity::create([
            'user_id' => $user,
            'activity' => $activity,
            'ip' => session()->get('ip_address')
        ]);
    }
}
