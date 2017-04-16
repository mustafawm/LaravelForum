<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;


class ReadThreadsTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();

        $this->thread = create('App\Thread');
    }

    /** * @test */
    public function a_user_can_view_all_threads()
    {
        $this->get('/threads')
            ->assertSee($this->thread->title);
    }

    /** * @test */
    public function a_user_can_view_single_thread()
    {
        $this->get($this->thread->path())
            ->assertSee($this->thread->title);
    }


    /** * @test */
    public function a_user_can_view_replies_on_thread()
    {
        $reply = create('App\Reply',['thread_id' => $this->thread->id]);


        $this->get($this->thread->path())
            ->assertSee($reply->body);
    }
}
