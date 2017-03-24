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

    /**
     * Test the user endpoint
     *
     * @return void
     */
    public function testUser()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user, 'api')
                         ->get('api/user');
        $response->assertStatus(200)
                 ->assertJson($user->toArray());
    }

    /**
     * Test the user orgs endpoint
     *
     * @return void
     */
    public function testUserOrgs()
    {
        $user = factory(User::class)->create();
        $orgs = factory(Org::class, 5)->create([
          'userid' => $user->id,
        ]);
        $response = $this->actingAs($user, 'api')
                         ->get('api/user/orgs');
        $response->assertStatus(200)
                 ->assertJson($user->orgs->toArray());
    }

    /**
     * Test the org home endpoint
     *
     * @return void
     */
    public function testOrgHome()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user, 'api')
                         ->get('api/org');
        $response->assertStatus(200)
                 ->assertJson(['org' => url('api/org/{id}'), 'docs' => url('http://docs.orgmanager.miguelpiedrafita.com')]);
    }

    /**
     * Test the org endpoint
     *
     * @return void
     */
    public function testOrg()
    {
        $user = factory(User::class)->create();
        $org = factory(Org::class)->create();
        $response = $this->actingAs($user, 'api')
                         ->get('api/org/'.$org->id);
        $response->assertStatus(200)
                 ->assertJson($org->toArray());
    }

    /**
     * Test the stats endpoint
     *
     * @return void
     */
    public function testStats()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user, 'api')
                         ->get('api/stats');
        $response->assertStatus(200)
                 ->assertJson(['users' => User::count(), 'orgs' => Org::count(), 'invites' => Org::sum('invitecount'), 'version' => config('app.orgmanager.version')]);
    }
}
