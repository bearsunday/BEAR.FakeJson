<?php

declare(strict_types=1);

namespace BEAR\FakeResource;

use BEAR\Resource\ResourceObject;
use Ray\Aop\MethodInterceptor;
use Ray\Aop\MethodInvocation;

interface FakeResourceInterceptorInterface extends MethodInterceptor
{
    public function invoke(MethodInvocation $invocation): ResourceObject;
}
