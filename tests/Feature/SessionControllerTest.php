<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SessionControllerTest extends TestCase
{
   public function testCreateSession()
   {
        $this->get('/session/create')
        ->assertSeeText('Ok')
        ->assertSessionHas('UserId', 'mursidin')
        ->assertSessionHas('IsMember', true);
   }

   public function testGetSession()
   {
        $this->withSession([
            'userId' => 'mursidin',
            'isMember' => 'true'
        ])
        ->get('/session/get')->assertSeeText('user-id: mursidin, is-member: true');
   }

   public function testGetSessionFiled()
   {
        $this->withSession([])->get('/session/get')->assertSeeText('user-id: guest, is-member: false');
   }
}
