<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FooBarProviderServiceTes extends TestCase
{
    public function testServicesProvider()
    {
        $foo = $this->app->make(Foo::class);
        $bar = $this->app->make(Bar::class);

        self::assertSame($foo, $bar);

        $foo1 = $this->app->make(Foo::class);
        $bar1 = $this->app->make(Bar::class);

        self::assertSame($foo1, $bar1);
        self::assertSame($bar->foo, $bar1->foo);
    }
}
