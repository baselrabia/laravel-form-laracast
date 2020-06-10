<?php

namespace Tests\Unit;

use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadTest extends TestCase
{
    use RefreshDatabase;

    protected $thread;

    public function setUp()
    {
        parent::setUp();

        $this->thread = create('App\Thread');
    }

    /** @test */
    function a_thread_can_make_a_string_path()
    {
        $this->assertEquals("/threads/{$this->thread->channel->slug}/{$this->thread->id}", $this->thread->path());
    }

    /** @test */

    public function a_thread_has_replies()
    {
        $this->assertInstanceOf(Collection::class,$this->thread->replies);
    }

        /** @test */
    public function a_thread_has_creator()
    {
        $this->assertInstanceOf("App\User",$this->thread->creator);
    }
    
    /** @test */
    public function a_thread_can_add_a_reply()
    {
        $this->thread->addReply([
            'body' => 'Foobar',
            'user_id' => 1
        ]);

        $this->assertCount(1, $this->thread->replies);
    }


     /** @test */
     public function a_thread_belongs_to_a_channel()
     {
         
         $this->assertInstanceOf('App\Channel', $this->thread->channel );
     }


}
