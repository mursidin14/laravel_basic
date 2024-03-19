<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{
    public function testInput()
    {
        $this->get('/input/hello?name=Mursidin')->assertSeeText('hello Mursidin');
        $this->post('/input/hello', ['name' => 'Mursidin'])->assertSeeText('hello Mursidin');
    }

    public function testNestedInput()
    {
        $this->post('/input/hello/first', [
            'name' => [ 'first' => 'Mur']
        ])->assertSeeText('hello Mur');
    }

    public function testInputAll()
    {
        $this->post('input/hello/input', [
            'name' => [
                'first' => 'Mur',
                'last' => 'Mursidin',
                'nim' => '19024',
            ]
        ])
        ->assertSeeText('name')->assertSeeText('first')->assertSeeText('Mur')->assertSeeText('last')->assertSeeText('Mursidin')->assertSeeText('nim')->assertSeeText('19024');
    }

    public function testInputArray()
    {
        $this->post('/input/hello/array', [
            'products' => [
                [
                    'name' => 'Makassar',
                    'provinsi' => 'sulawesi selatan'
                ],
                [
                    'name' => 'Bau-Bau',
                    'provinsi' => 'sulawesi tenggara'
                ]   
            ]
        ])->assertSeeText('Makassar')->assertSeeText('Bau-Bau');
    }
}
