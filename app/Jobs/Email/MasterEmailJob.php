<?php

namespace App\Jobs\Email;

use App\Mail\Email\MasterEmail;
use App\Models\Email;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class MasterEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $emailAddress;
    private $email_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($emailAddress, $email_id)
    {
        $this->emailAddress = $emailAddress;
        $this->email_id = $email_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = Email::query()->find($this->email_id);
        if ($email) {
            Mail::to($this->emailAddress)->send(new MasterEmail($email));
        }
    }
}
