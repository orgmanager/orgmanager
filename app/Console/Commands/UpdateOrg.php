<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Org;
use GitHub;

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
        $orgdata = GitHub::api('organization')->show($org->name);
        $org->name = $orgdata['login'];
        $org->description = $orgdata['description'];
        $org->save();
        $this->info($org->name.' updated successfully');
    }
}
