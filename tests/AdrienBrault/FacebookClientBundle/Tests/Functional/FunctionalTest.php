<?php

namespace AdrienBrault\FacebookClientBundle\Tests\Functional;

class FunctionalTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $kernel = new TestKernel();
        $kernel->boot();
    }
}
