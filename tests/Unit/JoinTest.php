<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Org;
use App\User;
use Illuminate\Support\Facades\Artisan;
use Github;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JoinTest extends TestCase
{
    use DatabaseTransactions;
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
