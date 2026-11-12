<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login(): void
    {
        $this->get('/')
            ->assertRedirect(route('login'));
    }

    public function test_private_modules_require_login(): void
    {
        $paths = [
            '/music',
            '/money',
            '/gallery',
        ];

        foreach ($paths as $path) {
            $this->get($path)
                ->assertRedirect(route('login'));
        }
    }

    public function test_owner_can_login(): void
    {
        $user = User::factory()->create([
            'password' => Hash::make('ExampleSecurePass123'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'ExampleSecurePass123',
        ]);

        $response->assertRedirect(route('dashboard'));

        $this->assertAuthenticatedAs($user);
    }

    public function test_invalid_password_is_rejected(): void
    {
        $user = User::factory()->create([
            'password' => Hash::make('ExampleSecurePass123'),
        ]);

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'WrongPassword123',
        ])->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_owner_can_logout(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post('/logout')
            ->assertRedirect(route('login'));

        $this->assertGuest();
    }
}
