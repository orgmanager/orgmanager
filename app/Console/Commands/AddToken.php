<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class AddToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orgmanager:tokens';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds tokens to all users missing them. For updating from OrgManager v1.1';

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
        $users = User::where('api_token', '')->get();
        $total = User::where('api_token', '')->count();
        if ($this->confirm('Do you want to add tokens for '.$total.' users?')) {
            $this->output->progressStart($total);
            foreach ($users as $user) {
                $user->api_token = str_random(60);
                $user->save();
                $this->output->progressAdvance();
            }
            $this->output->progressFinish();
            $this->info('Successfully generated tokens for '.$total.' users.');
        }
    }
}
