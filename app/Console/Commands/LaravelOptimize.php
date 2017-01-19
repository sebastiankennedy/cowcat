<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class LaravelOptimize extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laravel:optimize';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'optimize laravel project';

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
        $this->line("即将执行优化缓存命令");
        if($this->confirm('确定执行?')){
            $this->line("开始执行优化缓存命令");

            Artisan::call("config:cache");
            $this->info('Configuration cache cleared!');
            $this->info('Configuration cached successfully!');

            Artisan::call("route:cache");
            $this->info('Route cache cleared!');
            $this->info('Routes cached successfully!');

            Artisan::call("optimize");
            $this->info('Generating optimized class loader');

            if(function_exists('exec')){
                exec("composer dump-autoload");
            }

            Artisan::call("ide-helper:generate");
            $this->info('A new helper file was written to _ide_helper.php');

            $this->info("优化缓存成功");
        } else {
            $this->info("取消执行优化缓存命令");
        }
    }
}
