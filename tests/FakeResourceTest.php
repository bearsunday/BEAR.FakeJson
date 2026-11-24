<?php

declare(strict_types=1);

namespace BEAR\FakeResource;

use BEAR\FakeResource\Resource\Page\Index;
use BEAR\Resource\Module\ResourceModule;
use PHPUnit\Framework\TestCase;
use Ray\Di\AbstractModule;
use Ray\Di\Injector;

class FakeResourceTest extends TestCase
{
    public function testFakeResourceReturned(): void
    {
        $fakeResourceDir = __DIR__ . '/json';
        $injector = new Injector(new class ($fakeResourceDir) extends AbstractModule {
            public function __construct(
                public string $fakeResourceDir
            ) {
            }

            protected function configure(): void
            {
                $this->bind(Index::class);
                $this->install(new FakeResourceModule($this->fakeResourceDir));
                $this->install(new ResourceModule('BEAR\FakeResource'));
            }
        }, __DIR__ . '/tmp');
        $ro = $injector->getInstance(Index::class);
        $ro->onGet();
        $this->assertSame(['foo' => 'foo1'], $ro->body);
    }
}
