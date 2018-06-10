<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Word;


class WordDeleteTest extends TestCase
{
    public function test_word_delete_feature()
    {
        $user = factory(User::class)->create();
        $word = factory(Word::class)->make();
        $user->words()->create($word->toArray());
        $word = $user->words()->first();

        $this->assertDatabaseHas('words', [
            'user_id' => $user->id,
            'word' => $word->word
        ]);

        $this->actingAs($user)
                ->get(route('word.delete', ['id' => $word->id]))
                ->assertStatus(302)
                ->assertSessionHasNoErrors();
                
        $this->assertSoftDeleted('words', [
                'user_id' => $user->id,
                'word' => $word->word
        ]);
    }


    public function test_user_can_delete_other_users_word()
    {
        $user = factory(User::class)->create();
        $word = factory(Word::class)->make();
        $user->words()->create($word->toArray());
        $word = $user->words()->first();

        $user2 = factory(User::class)->create();
        $word2 = factory(Word::class)->make();
        $user2->words()->create($word2->toArray());
        
        $this->assertDatabaseHas('words', [
            'user_id' => $user->id,
            'word' => $word->word
        ]);

        $this->actingAs($user2)
                ->get(route('word.delete', ['id' => $word->id]))
                ->assertStatus(302)
                ->assertSessionHasErrors();
        
        $this->assertDatabaseHas('words', [
            'user_id' => $user->id,
            'word' => $word->word
        ]);;
    }
}
