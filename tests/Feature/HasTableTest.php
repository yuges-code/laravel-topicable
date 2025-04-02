<?php

namespace Yuges\Topicable\Tests\Feature;

use Yuges\Topicable\Tests\TestCase;
use Yuges\Topicable\Tests\Stubs\Models\User;

class HasTableTest extends TestCase
{
    public function testGettingTableName()
    {
        $this->assertEquals('users', User::getTableName());
    }
}
