<?php

namespace App\Adm\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class Start extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adm:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'First install all migrations and seeders';

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
     * @return
     */
    public function handle()
    {
        $this->call('migrate');
        $this->info("-- migrations done");

        $user = User::where('email', 'admin@admin.com')->first();

        if(!$user) {
            $this->call('db:seed');
            $this->info("-- data added to db");
        }

        if(File::exists('storage/public/media')) {
            File::deleteDirectory('storage/public/media');
            $this->info("-- storage/public/media removed");
        }

        if(File::exists('public/storage')) {
            File::deleteDirectory('public/storage');
            $this->info("-- public/storage media removed");
        }

        $this->call('storage:link');
        $this->info("-- storage link created");

        $this->call('optimize:clear');
    }
}
