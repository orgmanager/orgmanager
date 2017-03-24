<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Org;
use App\User;

class DataTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test dashboard gets orgs.
     *
     * @return void
     */
    public function testDashboard()
    {
        $user = factory(User::class)->create();
        $orgs = factory(Org::class, 5)->create([
          'userid' => $user->id,
        ]);
        $response = $this->actingAs($user)
                         ->get('dashboard');

        $response->assertStatus(200)
                 ->assertViewHas('orgs', Org::where('userid', '=', $user->id)->paginate(15));
    }

    /**
     * Test organization settings page gets orgs.
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
}
