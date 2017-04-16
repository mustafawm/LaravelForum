<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;


    /** @test */
    function unauthenticated_user_cannot_add_replies()
    {
        $this->withExceptionHandling()
                ->post('/threads/channel/id/replies', [])
                ->assertRedirect('/login');
    }


    /** @test */
    public function an_authenticated_user_can_reply_to_forums()
    {
        $this->signIn();

        $thread = create('App\Thread');

        $reply = make('App\Reply');

        $this->post($thread->path().'/replies', $reply->toArray());

        $this->get($thread->path())
                ->assertSee($reply->body);

    }
}
