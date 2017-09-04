<?php

namespace Tests\Feature;

use App\Org;
use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the home endpoint.
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
     * Test the user endpoint.
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
     * Test the user orgs endpoint.
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
     * Test the org home endpoint.
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
     * Test the org endpoint.
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
     * Test the stats endpoint.
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

    /**
     * Test the org password endpoint.
     *
     * @return void
     */
    public function testOrgPasswd()
    {
        $user = factory(User::class)->create();
        $org = factory(Org::class)->create([
          'userid' => $user->id,
        ]);
        $password = str_random(10);
        $response = $this->actingAs($user, 'api')
                         ->json('POST', 'api/org/'.$org->id, ['password' => $password]);
        $expected = $org->toArray();
        $expected['password'] = $password;
        $response->assertStatus(200)
                 ->assertJson($expected);
    }

    /**
     * Test the org update endpoint.
     *
     * @return void
     */
    public function testOrgUpdate()
    {
        $user = factory(User::class)->create();
        $org = factory(Org::class)->create([
          'userid' => $user->id,
        ]);
        Artisan::shouldReceive('call')
                    ->once()
                    ->with('orgmanager:updateorg', ['org' => $org->id])
                    ->andReturn(null);
        $response = $this->actingAs($user, 'api')
                         ->put('api/org/'.$org->id);
        $response->assertStatus(204);
    }

    /**
     * Test the delete org endpoint.
     *
     * @return void
     */
    public function testOrgDelete()
    {
        $user = factory(User::class)->create();
        $org = factory(Org::class)->create([
          'userid' => $user->id,
        ]);
        $response = $this->actingAs($user, 'api')
                         ->delete('api/org/'.$org->id);
        $response->assertStatus(204);
        $this->assertNull(Org::find($org->id));
    }

    /**
     * Test the join endpoint.
     *
     * @return void
     */
    public function testJoin()
    {
        $user = factory(User::class)->create();
        $org = factory(Org::class)->create([
          'userid' => $user->id,
        ]);
        Artisan::shouldReceive('call')
                    ->once()
                    ->with('orgmanager:joinorg', ['org' => $org->id, 'username' => $user->github_username])
                    ->andReturn(null);
        $response = $this->actingAs($user, 'api')
                         ->json('POST', 'api/join/'.$org->id, ['username' => $user->github_username]);
        $response->assertStatus(204);
    }

    /**
     * Test the token regenerate endpoint.
     *
     * @return void
     */
    public function testTokenRegenerate()
    {
        $user = factory(User::class)->create();
        $token = $user->api_token;
        $response = $this->actingAs($user, 'api')
                         ->get('api/token/regenerate');
        $response->assertStatus(200);
        $this->assertNotSame($user->api_token, $token);
    }
}
