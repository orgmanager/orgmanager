<?php

namespace Tests\Feature;

use App\Org;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StatusTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the home page returns a 200 status code (OK).
     *
     * @return void
     */
    public function testHomePage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test the login page redirects to GitHub.
     *
     * @return void
     */
    public function testLoginPage()
    {
        $response = $this->get('login');
        parse_str(parse_url($response->headers->get('location'))['query'], $query);

        $response->assertRedirect('https://github.com/login/oauth/authorize?scope=user%3Aemail%2Cadmin%3Aorg&response_type=code&state='.$query['state']);
    }

    /**
     * Test the dashboard page redirects to login.
     *
     * @return void
     */
    public function testDashboardAuth()
    {
        $response = $this->get('dashboard');

        $response->assertRedirect('login');
    }

    /**
     * Test the dashboard returns a 200 status code when logged in (OK).
     *
     * @return void
     */
    public function testDashboard()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)
                         ->get('dashboard');

        $response->assertStatus(200);
    }

    /**
     * Test the /o/{org} page redirects to the /join/{id} page.
     *
     * @return void
     */
    public function testJoinRedirect()
    {
        $org = factory(Org::class)->create();
        $response = $this->get('o/'.$org->name);

        $response->assertRedirect('join/'.$org->id);
    }

    /**
     * Test the join page returns a 200 status code (OK).
     *
     * @return void
     */
    public function testJoinPage()
    {
        $org = factory(Org::class)->create();
        $response = $this->get('join/'.$org->id);

        $response->assertStatus(200);
    }

    /**
     * Test the developers page returns a 200 status code (OK).
     *
     * @return void
     */
    public function testDevPage()
    {
        $response = $this->get('developer');

        $response->assertStatus(200);
    }

    /**
     * Test the token page returns a 200 status code (OK).
     *
     * @return void
     */
    public function testTokenPage()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)
                          ->get('token');

        $response->assertStatus(200);
    }

    /**
     * Test the organization settings page returns a 200 status code (OK).
     *
     * @return void
     */
    public function testOrgPage()
    {
        $user = factory(User::class)->create();
        $org = factory(Org::class)->create([
           'userid' => $user->id,
         ]);
        $response = $this->actingAs($user)
                          ->get('org/'.$org->id);
        $response->assertStatus(200);
    }

    /**
     * Test the teams page returns a 200 status code (OK).
     *
     * @return void
     */
    public function testTeamsPage()
    {
        $user = factory(User::class)->create();
        $org = factory(Org::class)->create([
           'userid' => $user->id,
         ]);
        $response = $this->actingAs($user)
                          ->get('org/'.$org->id.'/teams');
        $response->assertStatus(200);
    }
}
