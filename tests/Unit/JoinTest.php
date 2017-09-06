<?php

namespace Tests\Unit;

use Github;
use App\Org;
use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
        Artisan::call('orgmanager:joinorg', [
          'org'      => $org->id,
          'username' => $user->github_username,
        ]);
        $this->assertEquals($user->github_username.' was invited to '.$org->name."\n", Artisan::output());
    }
}
