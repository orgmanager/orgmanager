<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use App\Org;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApiTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test the home endpoint
     *
     * @return void
     */
    public function testHome()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user, 'api')
                         ->get('api');
        $response->assertStatus(200)
                 ->assertJson(['user' => url('api/user'), 'user_orgs' => url('api/user/orgs'), 'org' => url('api/org/{id}'), 'org_password' => url('api/org/{id}'), 'update_org' => url('api/org/{id}'), 'join' => url('api/join/{id}'), 'stats' => url('api/stats'), 'docs' => url('http://docs.orgmanager.miguelpiedrafita.com')]);
    }
}
