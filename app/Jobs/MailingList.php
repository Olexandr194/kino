<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class MailingList implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $email;
    private $html;

    public function __construct($email, $html)
    {
        $this->email = $email;
        $this->html = $html;
    }

    public function handle()
    {
        $user_email = $this->email;
        $html = $this->html;

        Mail::html($html, function ($message) use ($user_email) {
            $message->from('olexandrmirochnik@gmail.com', 'Сповіщення');
            $message->subject('Сповіщення');
            $message->to($user_email);
        });
    }
}
