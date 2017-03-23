<?php

namespace Tests\Feature;

use Tests\TestCase;

class StatusTest extends TestCase
{
    /**
     * Test the home page returns a 200 status code (OK)
     *
     * @return void
     */
    public function testHomePage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test the login page redirects to GitHub
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
     * Test the dashboard page redirects to login
     *
     * @return void
     */
    public function testDashboard()
    {
        $response = $this->get('dashboard');

        $response->assertRedirect('login');
    }
}
