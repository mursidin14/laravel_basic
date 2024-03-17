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

    // Routing Parameter
    public function testRoutingParameter()
    {
        $this->get('/products/1')
             ->assertStatus(200)
             ->assertSeeText('Products 1');

        $this->get('/products/2')
             ->assertStatus(200)
             ->assertSeeText('Products 2');

        $this->get('/products/1/items/lampu')
             ->assertStatus(200)
             ->assertSeeText('Products 1, Items lampu');

        $this->get('/products/2/items/fiting')
             ->assertStatus(200)
             ->assertSeeText('Products 2, Items fiting');
    }
}
