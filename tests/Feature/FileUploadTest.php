<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class FileUploadTest extends TestCase
{
    public function testUpload()
    {
        $image = UploadedFile::fake()->image("antony.png");

        $this->post('/file/upload', [
            'picture' => $image,
        ])->assertSeeText("OK: antony.png");

    }
}
