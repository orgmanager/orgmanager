<?php

namespace Tests\Feature;

use App\Org;
use App\User;
use Tests\TestCase;

class StatusTest extends TestCase
{
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

        $response->assertRedirect('https://github.com/login/oauth/authorize?client_id='.env('GITHUB_ID').'&scope=user%3Aemail%2Cadmin%3Aorg&redirect_uri='.env('GITHUB_CALLBACK').'&response_type=code&state='.$query['state']);
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
        $user->delete();
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
        $org->delete();
    }
}
