<?php

namespace App\Console\Commands;

use Github;
use App\Org;
use Illuminate\Console\Command;

class UpdateOrg extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orgmanager:updateorg {org : The ID of the organization}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to update organization data from Github (mostly used internally)';

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
        $orgdata = Github::api('organization')->show($org->name);
        $org->name = $orgdata['login'];
        if (isset($orgdata['name'])) {
            $org->pretty_name = $orgdata['name'];
        }
        $org->description = $orgdata['description'];
        $org->avatar = 'https://avatars.githubusercontent.com/'.$orgdata['login'];
        $org->save();
        $this->info($org->name.' updated successfully');
    }
}
