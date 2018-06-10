<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Word;
use App\User;

class WordShowingTest extends TestCase
{
    /**
     * Show words for owner user.
     *
     * @return void
     */
    public function test_is_show_words_to_owner()
    {
       $user = factory(User::class)->create();
       $word = factory(Word::class)->make();
       $user->words()->create($word->toArray());

       // other user words
       $otherUser = factory(User::class)->create();
       $otherUsersWord = factory(Word::class)->make();
       $otherUser->words()->create($otherUsersWord->toArray());

       $this->actingAs($user)
            ->get(route('home'))
            ->assertSee('All Words')
            ->assertSee($word->word)
            ->assertSee($word->mean)
            ->assertDontSee($otherUsersWord->word)
            ->assertDontSee($otherUsersWord->mean);
            
    }
}
