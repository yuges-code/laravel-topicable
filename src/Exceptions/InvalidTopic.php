<?php

namespace Yuges\Topicable\Exceptions;

use Exception;
use TypeError;
use Yuges\Topicable\Models\Topic;

class InvalidTopic extends Exception
{
    public static function doesNotImplementTopic(string $class): TypeError
    {
        $topic = Topic::class;

        return new TypeError("Topic class `{$class}` must implement `{$topic}`");
    }
}
