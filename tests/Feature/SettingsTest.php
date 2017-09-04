<?php

namespace Tests\Feature;

use App\Org;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SettingsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test settings page is loaded.
     *
     * @return void
     */
    public function testDashboard()
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
     * Test password can be changed.
     *
     * @return void
     */
    public function testPassword()
    {
        $user = factory(User::class)->create();
        $org = factory(Org::class)->create([
          'userid' => $user->id,
        ]);
        $response = $this->actingAs($user)
                         ->post('org/'.$org->id, ['org_passwd' => 'password']);
        $org->refresh();
        $response->assertRedirect('org/'.$org->id)
                 ->assertSessionHas('success', 'The organization password was successfully updated.');
        $this->assertTrue(password_verify('password', $org->password));
    }

    /**
     * Test organization can be deleted.
     *
     * @return void
     */
    public function testDelete()
    {
        $user = factory(User::class)->create();
        $org = factory(Org::class)->create([
          'userid' => $user->id,
        ]);
        $response = $this->actingAs($user)
                         ->delete('org/'.$org->id);
        $response->assertRedirect('dashboard')
                 ->assertSessionHas('success', 'The organization was successfully deleted.');
        $this->assertFalse($org->exists());
    }

    /**
     * Test custom message can be changed.
     *
     * @return void
     */
    public function testCustomMessage()
    {
        $user = factory(User::class)->create();
        $org = factory(Org::class)->create([
          'userid' => $user->id,
        ]);
        $response = $this->actingAs($user)
                         ->post('org/'.$org->id.'/message', ['message' => '# Markdown test']);
        $org->refresh();
        $response->assertRedirect('org/'.$org->id)
                 ->assertSessionHas('success', 'The message was successfully updated.');
        $this->assertEquals('# Markdown test', $org->custom_message);
        $response = $this->actingAs($user)
                         ->post('org/'.$org->id.'/message', ['message' => 'Some text, \'<script>alert()</script>']);
        $response->assertRedirect('org/'.$org->id)
                 ->assertSessionHas('success', 'The message was successfully updated.');
        $this->assertNotEquals('Some text, \'<script>alert()</script>', $org->custom_message);
    }
}
