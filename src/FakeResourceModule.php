<?php

declare(strict_types=1);

namespace BEAR\FakeResource;

use BEAR\FakeResource\Attribute\FakeResourceDir;
use BEAR\Resource\ResourceObject;
use Ray\Di\AbstractModule;

final class FakeResourceModule extends AbstractModule
{
    public function __construct(private string $fakeResourceDir, ?AbstractModule $module = null)
    {
        parent::__construct($module);
    }

    protected function configure(): void
    {
        $this->bind()->annotatedWith(FakeResourceDir::class)->toInstance($this->fakeResourceDir);
        $this->bind(FakeResourceInterceptorInterface::class)->to(FakeResourceInterceptor::class);
        $this->bindInterceptor(
            $this->matcher->subclassesOf(ResourceObject::class),
            $this->matcher->startsWith('on'),
            [FakeResourceInterceptorInterface::class]
        );
    }
}
