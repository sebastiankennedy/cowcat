<?php

namespace App\Console\Commands;

use App\Facades\UserRepository;
use Illuminate\Console\Command;
use Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'use SendCloud to send emails';

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
     * @return mixed
     */
    public function handle()
    {
        $this->line("即将执行邮件发送命令");

        if($this->confirm('确定执行?')){
            $users = UserRepository::all();

            $bar = $this->output->createProgressBar(count($users));

            foreach ($users as $user) {
                $icon = "http://o93kt6djh.bkt.clouddn.com/Laravel-SendEmaillaravel-200x50.png";
                $image = "http://o93kt6djh.bkt.clouddn.com/Laravel-SendEmaillaravel-600x300.jpg";

                Mail::send('emails.test-image',
                    [
                        'name'  => $user->name,
                        'icon'  => $icon,
                        'image' => $image,
                    ],
                    function ($email) use ($user) {
                        $email->to($user->email)->subject('图文邮件标题');
                    });

                $bar->advance();
            }

            $bar->finish();

            $this->info("发送邮件完毕");
        } else {
            $this->info("取消执行邮件发送命令");
        }
    }
}
