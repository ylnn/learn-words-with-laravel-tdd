<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Log;

class UserRegisterTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_is_new_user_can_register()
    {
        $data = factory('App\User')->make();

        $this->post(route('register'), $data->toArray())
            ->assertRedirect("/");
    }

    public function test_is_error_on_wrong_register_credintials()
    {
        $data = [
            'name' => 'Wrong User',
            'email' => 'email.email.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];
        
        $response = $this->post(route('register'), $data);

        $response->assertRedirect('/')->
            assertSessionHasErrors(['email'], $format = null, $errorBag = 'default');
    }
}
