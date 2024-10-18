<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfilesTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_profile()
    {
        $user = User::factory()->create();

        $response = $this->get(route('profiles.show', $user));

        $response->assertStatus(200);
        $response->assertViewIs('auth.profile');
        $response->assertViewHas('user', $user);
    }

    public function test_nonexistent_user_profile_returns_404()
    {
        $response = $this->get(route('profiles.show', 999));

        $response->assertStatus(404);
    }

    public function test_profile_page_contains_user_information()
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        $response = $this->get(route('profiles.show', $user));

        $response->assertSee($user->name);
        $response->assertSee($user->email);
    }

    public function test_authenticated_user_can_view_other_user_profiles()
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();

        $response = $this->actingAs($user1)->get(route('profiles.show', $user2));

        $response->assertStatus(200);
        $response->assertViewHas('user', $user2);
    }
}
