<?php

namespace Tests\Unit;

use App\Org;
use App\User;
use Github;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JoinTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testJoinCommand()
    {
        $user = factory(User::class)->create();
        $org = factory(Org::class)->create([
            'userid' => $user->id,
        ]);
        Github::shouldReceive('authenticate')
                  ->once()
                  ->with($org->user->token, null, 'http_token')
                  ->andReturn();
        $this->artisan('orgmanager:joinorg', ['org' => $org->id, 'username' => $user->github_username])
             ->expectsOutput("$user->github_username was invited to $org->name");
    }
}
