<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserLoginAlert;

class SendLoginNotification implements ShouldQueue
{
    use InteractsWithQueue;

    public function __construct()
    {
        //
    }

    public function handle(UserLoggedIn $event)
    {
        $adminEmail = 'khairuman752@cmihospital.com'; // Change this to your admin email address
        Mail::to($adminEmail)->send(new UserLoginAlert($event->user));
    }
}
