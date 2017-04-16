<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function authenticated_user_can_create_threads()
    {
        $this->signIn(); // check TestCase.php

        $thread = create('App\Thread');// raw() returns an ARRAY of Thread instance (make() returns an obj)

        $this->post('/threads', $thread->toArray());

        $this->get($thread->path())
                ->assertSee($thread->title)
                ->assertSee($thread->body);
    }

    /** @test */
    public function guests_cannot_create_threads()
    {
        $this->withExceptionHandling();

        $this->get('/threads/create')
                ->assertRedirect('/login');

        $this->post('/threads')
                ->assertRedirect('/login');
    }
}
