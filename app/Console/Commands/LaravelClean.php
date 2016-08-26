<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class LaravelClean extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laravel:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'clean project all cache';

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
        $this->line("即将执行清除缓存命令");
        if($this->confirm('确定执行?')){
            $this->line("开始执行清楚缓存命令");

            Artisan::call("clear-compiled");

            Artisan::call("auth:clear-resets");
            $this->info('Expired reset tokens cleared!');

            Artisan::call("cache:clear");
            $this->info('Application cache cleared!');

            Artisan::call("config:clear");
            $this->info('Configuration cache cleared!');

            Artisan::call("debugbar:clear");
            $this->info('Debugbar Storage cleared!');

            Artisan::call("route:clear");
            $this->info('Route cache cleared!');

            Artisan::call("view:clear");
            $this->info('Compiled views cleared!');

            $this->info("清除缓存成功");
        } else {
            $this->info("取消执行清除缓存命令");
        }
    }
}
