<?php

namespace Yuges\Topicable\Exceptions;

use Exception;
use TypeError;
use Yuges\Topicable\Models\Topicable;

class InvalidTopicable extends Exception
{
    public static function doesNotImplementTopicable(string $class): TypeError
    {
        $topicable = Topicable::class;

        return new TypeError("Topicable class `{$class}` must implement `{$topicable}`");
    }
}
