<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CookieControllerTest extends TestCase
{
    public function testCreateCookie()
    {
        $this->get('/cookie/set')
             ->assertSeeText('hello cookie')
             ->assertCookie('User-Id', 'mursidin')
             ->assertCookie('Is-Member', 'true');
    }

    public function testGetCookie()
    {
        $this->withCookie('User-Id', 'mursidin')
             ->withCookie('Is-Member', 'true')
             ->get('/cookie/get')
             ->assertJson([
                'UserId' => 'mursidin',
                'IsMember' => 'true'
             ]);
    }
}
