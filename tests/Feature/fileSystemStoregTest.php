<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class fileSystemStoregTest extends TestCase
{
    public function testStorage()
    {
        $filesystem = Storage::disk('local');
        $filesystem->put('file.txt', 'Put Your Content Here');

        self::assertEquals('Put Your Content Here', $filesystem->get('file.txt'));
    }

    public function testPublic()
    {
        $filesystem = Storage::disk('public');
        $filesystem->put('file.txt', 'Put Your Content Here');

        $content = $filesystem->get('file.txt');

        self::assertEquals('Put Your Content Here', $content);
    }
}
