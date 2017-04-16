<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReplyTest extends TestCase
{
    use DatabaseMigrations;

    protected $reply;

    public function setUp()
    {
        parent::setUp();

        $this->reply = create('App\Reply');
    }

    /** @test */
    public function it_has_a_creator()
    {
        $this->assertInstanceOf('App\User',$this->reply->owner);
    }
}
