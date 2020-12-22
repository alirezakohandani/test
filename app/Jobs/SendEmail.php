<?php

namespace App\Jobs;

use App\Mail\SendEmailVerification;
use App\Models\User as ModelsUser;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(User $user)
    {
      
        // $user = $request->user();
        // $token = $request->user()->token;

        return Mail::to($user->email)->send(new SendEmailVerification($user->email, $user->token));
    }
}
