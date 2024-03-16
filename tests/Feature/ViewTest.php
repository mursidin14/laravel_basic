<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    public function testView() 
    {
        $this->get('/hello')
            ->assertStatus(200)
            ->assertSeeText('Hello mursidin');  
    }

    public function testNested()
    {
        $this->get('/nested')
            ->assertStatus(200)
            ->assertSeeText('Nested, hello antonio');
    }

    public function testTemplate()
    {
        $this->view('hello', ['name' => 'mursidin'])
             ->assertSeeText('Hello mursidin');

        $this->view('nested.hello', ['nestedname' => 'mursidin'])
             ->assertSeeText('Nested, hello mursidin');
    }
}
