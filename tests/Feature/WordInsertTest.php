<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class WordInsertTest extends TestCase
{
   /**
    * Test show creation page
    *
    * @return void
    */
    public function test_it_can_show_new_word_creation_page()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->get(route('word.create'))
            ->assertStatus(200)
            ->assertSee('Add Word')
        ;
    }

    /**
     * Test permission of new word create page
     *
     * @return void
     */
    public function test_insert_permission_new_word_creation_page()
    {
        $this->get(route('word.create'))
            ->assertStatus(302)
            ; 
    }

    /**
     * Test saving new word
     *
     * @return void
     */
    public function test_it_can_save_new_word()
    {
       $user = factory(User::class)->create();

       $data = [
           'word' => 'Blue',
           'mean' => 'Mavi',
           'user_id' => $user->id,
       ];

       $this->actingAs($user)
            ->post(route('word.store'), $data)
            ->assertRedirect(route('home'))
            ->assertSessionHasNoErrors();
    }

    /**
     * Test save word validation
     *
     * @return void
     */
    public function test_save_new_word_validation()
    {
       $user = factory(User::class)->create();

       $data = [
           'mean' => 'Mavi'
       ];

       $this->actingAs($user)
            ->post(route('word.store'), $data)
            ->assertSessionHasErrors();
    }


}
