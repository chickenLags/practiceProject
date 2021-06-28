<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use TCG\Voyager\VoyagerServiceProvider;

class Refresh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $this->info('running migrate fresh --seed.');
        $this->call('migrate:fresh', []);
        $this->call('db:seed', []);

        $this->info('running voyager:install.');
        $tags = ['seeds'];
//        $this->call('vendor:publish', ['--provider' => VoyagerServiceProvider::class, '--tag' => $tags]);
        //$this->call('migrate', ['--force' => $this->option('force')]); ??
//        $this->call('vendor:publish', ['--provider' => VoyagerServiceProvider::class, '--tag' => ['config', 'voyager_avatar']]);

        $this->info('Seeding data into the database');
        $this->call('db:seed', ['--class' => 'VoyagerDatabaseSeeder']);

        $this->info('Setting up the hooks');
        $this->call('hook:setup');

        $this->info('Adding the storage symlink to your public folder');
        $this->call('storage:link');

        $this->info('Successfully installed Voyager! Enjoy');

        $this->info('running voyager:admin.');
        $this->call('voyager:admin', ['email' => 'z_roi@hotmail.com']);

        return 0;
    }
}
