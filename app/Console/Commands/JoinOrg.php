<?php

namespace App\Console\Commands;

use Github;
use App\Org;
use Illuminate\Console\Command;

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
        if (config('app.env') != 'testing') {
            if ($this->isMember($org, $this->argument('username'))) {
                $this->error($this->argument('username').' is already a member of '.$org->name);

                return;
            }
            if (isset($org->team)) {
                Github::api('teams')->addMember($org->team->id, $this->argument('username'));
            } else {
                Github::api('organization')->members()->add($org->name, $this->argument('username'));
            }
        }
        $org->invitecount++;
        $org->save();
        $this->info($this->argument('username').' was invited to '.$org->name);
    }

    protected function isMember(Org $org, $username): bool
    {
        Github::authenticate($org->user->token, null, 'http_token');
        try {
            Github::api('organization')->members()->show($org->name, $username);
        } catch (Github\Exception\RuntimeException $e) {
            return false;
        }

        return true;
    }
}
