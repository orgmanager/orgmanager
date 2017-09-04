<?php

namespace App\Console\Commands;

use App\Org;
use Illuminate\Console\Command;

class EncryptOrgPasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orgmanager:orgpwdcrypt';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Encrypts ORG passwords. For updating from OrgManager v1.1';

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
        $orgs = Org::whereNotNull('password')->get();
        $total = Org::whereNotNull('password')->count();
        if ($total == 0) {
            $this->error('There aren\'t any password-protected organizations.');
        } else {
            if ($this->confirm('Do you want to add encrypt '.$total.' passwords?')) {
                $this->output->progressStart($total);
                foreach ($orgs as $org) {
                    $org->password = bcrypt($org->password);
                    $org->save();
                    $this->output->progressAdvance();
                }
                $this->output->progressFinish();
                $this->info('Successfully encrypted '.$total.' passwords.');
            }
        }
    }
}
