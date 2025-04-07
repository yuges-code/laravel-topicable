<?php

namespace Yuges\Topicable\Tests\Stubs\Models;

use Yuges\Package\Models\Model;
use Yuges\Topicable\Interfaces\Topicable;
use Yuges\Topicable\Traits\HasTopics;

class Post extends Model implements Topicable
{
    use HasTopics;

    protected $table = 'posts';

    protected $guarded = ['id'];
}
