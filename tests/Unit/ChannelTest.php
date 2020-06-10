<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ChannelTest extends TestCase
{

    use DatabaseMigrations;
    /** @test */
    function a_channel_cosist_of_threads()
    {
        $channel = create('App\Channel');
        $thread = create('App\Thread',['channel_id'=>$channel->id]);

        $this->assertEquals($thread->channel->id,$channel->id);

    }
}
