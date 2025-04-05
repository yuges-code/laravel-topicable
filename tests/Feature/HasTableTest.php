<?php

namespace Yuges\Topicable\Tests\Feature;

use Yuges\Topicable\Models\Topic;
use Yuges\Topicable\Tests\TestCase;
use Yuges\Topicable\Models\Topicable;
use Yuges\Topicable\Tests\Stubs\Models\User;

class HasTableTest extends TestCase
{
    public function testGettingTableName()
    {
        $this->assertEquals('users', User::getTableName());
        $this->assertEquals('topics', Topic::getTableName());
        $this->assertEquals('topicables', Topicable::getTableName());
    }
}
