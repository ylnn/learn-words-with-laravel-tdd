<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

class UserLoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_is_user_login()
    {
        $user = factory('App\User')->create(['password' => Hash::make('testpass')]);
        $this->post(route('login'), ['email' => $user->email, 'password' => 'testpass'])
        ->assertSessionHasNoErrors();
    }

    public function test_is_login_give_errors_on_wrong_credentials()
    {
        $user = factory('App\User')->create(['password' => Hash::make('testpass')]);
        $this->post(route('login'), ['email' => $user->email, 'password' => 'testpass1'])
        ->assertSessionHasErrors();
    }
}
