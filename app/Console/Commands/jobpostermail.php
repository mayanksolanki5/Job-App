<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\applyJob;
use App\Createjob;
use App\User;
use App\Mail\JobPosterMailSend;
use App\Mail\JobPosterMailSendMarkdown;
use Illuminate\Support\Facades\Mail;


class jobpostermail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jobposter:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending mail of participants to Jobposter';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $users = Createjob::all();

        foreach($users as $user){
            $id = $user->id;
            
            $applications = Createjob::find($id)->applyJob;  
            
            if(count($applications) > 0){
                $userid = $user->user_id;
                // echo $userid;
                
                $user_email = User::find($userid)->email;
                // dd($applications->toArray());
                // dd($user_email);

                Mail::to($user_email)->send(new JobPosterMailSendMarkdown($applications));
            }

        }
    }
}