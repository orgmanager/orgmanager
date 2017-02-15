<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GitHub;
use App\Org;

class JoinOrg extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orgmanager:joinorg {org : The ID of the organization} {username : The Github username of the user to invite}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to invite a github user to an organization (mostly used internally)';

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
         $org = Org::findOrFail($this->argument('org'));
         Github::authenticate($org->user->token, null, 'http_token');
         Github::api('organization')->members()->add($org->name, $this->argument('username'));
         $org->invitecount++;
         $org->save();
         $this->info($this->argument('username').' was invited to '.$org->name);
     }
}
