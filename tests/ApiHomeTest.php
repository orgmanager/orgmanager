<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;

class ApiHomeTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * Test the API home page status.
     *
     * @return void
     */
    public function testhome()
    {
        $response = $this->call('GET', 'api');
        $this->assertEquals(200, $response->status());
    }

    public function testendpointsdisplayed()
    {
        $this->get('api')
      ->seeJson([
        'docs' => 'https://github.com/m1guelpf/orgmanager/wiki (TODO)',
      ]);
    }
}
