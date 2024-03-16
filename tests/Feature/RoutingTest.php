<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    public function testGet()
    {
        $this->get('/testing')
            ->assertStatus(200)
            ->assertSeeText('Hello World');
    }

    public function testRedirect()
    {
        $this->get('/sosmed')
            ->assertRedirect('/testing');
    }
    
    public function testFallback()
    {
        $this->get('/tidak')
            ->assertSeeText('404');
    }
}
