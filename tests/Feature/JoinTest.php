<?php

namespace Tests\Feature;

use App\Org;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JoinTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the username checker works.
     *
     * @return void
     */
    public function testUsernameCheck()
    {
        $user = factory(User::class)->create();
        $org = factory(Org::class)->create([
          'userid' => $user->id,
        ]);

        $response = $this->post('join/'.$org->id, ['github_username' => 'idonotexist9995964']);

        $response->assertStatus(302);
    }
}
