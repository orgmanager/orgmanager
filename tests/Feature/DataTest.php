<?php

namespace Tests\Feature;

use App\Org;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DataTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test dashboard gets orgs.
     *
     * @return void
     */
    public function testDashboard()
    {
        $user = factory(User::class)->create();
        factory(Org::class, 5)->create([
          'userid' => $user->id,
        ]);
        $response = $this->actingAs($user)
                         ->get('dashboard');

        $response->assertStatus(200)
                 ->assertViewHas('orgs', Org::where('userid', '=', $user->id)->paginate(15));
    }

    /**
     * Test organization settings page gets org.
     *
     * @return void
     */
    public function testOrg()
    {
        $user = factory(User::class)->create();
        $org = factory(Org::class)->create([
          'userid' => $user->id,
        ]);
        $response = $this->actingAs($user)
                         ->get('org/'.$org->id);
        $response->assertStatus(200)
                 ->assertViewHas('org');
    }

    /**
     * Test teams page gets org.
     *
     * @return void
     */
    public function testTeams()
    {
        $user = factory(User::class)->create();
        $org = factory(Org::class)->create([
          'userid' => $user->id,
        ]);
        $response = $this->actingAs($user)
                         ->get('org/'.$org->id.'/teams');
        $response->assertStatus(200)
                 ->assertViewHas('org');
    }

    /**
     * Test join page gets org.
     *
     * @return void
     */
    public function testJoin()
    {
        $user = factory(User::class)->create();
        $org = factory(Org::class)->create([
          'userid' => $user->id,
        ]);
        $response = $this->actingAs($user)
                         ->get('join/'.$org->id);
        $response->assertStatus(200)
                 ->assertViewHas('org');
    }
}
