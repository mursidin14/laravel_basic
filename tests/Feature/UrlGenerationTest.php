<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UrlGenerationTest extends TestCase
{
    public function testCurrent()
    {
        $this->get('/url/current?name=mursidin')->assertSeeText('/url/current?name=mursidin');
    }

    public function testNamed()
    {
        $this->get('/url/named')->assertSeeText('/redirect/name/mursidin');
    }

    public function testAction()
    {
        $this->get('/url/action')->assertSeeText('/form');
    }
}
