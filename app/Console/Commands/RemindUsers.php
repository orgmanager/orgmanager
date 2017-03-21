<?php

namespace App\Console\Commands;

use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\RemindUsers as Reminder;

class RemindUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orgmanager:remind-users {{ --force }}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an emmail to users that have not got any organizations and registered this week. (Internal use)';

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
        $users = User::where('created_at', '>=', Carbon::now()->subWeek())->get();
        if ($this->option('force') || $this->confirm('Do you want to send emails to '.$users->count().' users?', true)) {
            $this->output->progressStart($users->count());
            foreach ($users as $user) {
                if (count($user->orgs) == 0) {
                    Mail::to($user->email)->send(new Reminder($user));
                }
                $this->output->progressAdvance();
            }
            $this->output->progressFinish();
            $this->info('Successfully sent emails for '.$users->count().' users.');
        }
    }
}
