<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Word;
use App\User;

class WordFilterTest extends TestCase
{
    public function test_is_filter_working()
    {
        $user = factory(User::class)->create();
        $word = factory(Word::class)->make();
        $word2 = factory(Word::class)->make();
        $user->words()->create($word->toArray());
        $user->words()->create($word2->toArray());

        $this->actingAs($user)
            ->get(route('home', ['filter' => $word->word]))
            ->assertStatus(200)
            ->assertSeeText('All Words')
            ->assertSeeText($word->word)
            ->assertDontSeeText($word2->word)
        ;
    }
}
