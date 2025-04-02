<?php

namespace Yuges\Topicable\Config;

use Yuges\Package\Enums\KeyType;
use Yuges\Topicable\Models\Topic;
use Illuminate\Support\Collection;
use Yuges\Topicable\Models\Topicable;

class Config extends \Yuges\Package\Config\Config
{
    const string NAME = 'topicable';

    /** @return class-string<Topic> */
    public static function getTopicClass(mixed $default = null): string
    {
        return self::get('model.topic.class', $default);
    }

    public static function getTopicKeyType(mixed $default = null): KeyType
    {
        return self::get('models.topic.key', $default);
    }

    /** @return class-string<Topicable> */
    public static function getTopicableClass(mixed $default = null): string
    {
        return self::get('models.topicable.class', $default);
    }

    public static function getTopicableKeyType(mixed $default = null): KeyType
    {
        return self::get('models.topicable.key', $default);
    }

    /** @return Collection<array-key, class-string<Topicable>> */
    public static function getTopicableAllowedClasses(mixed $default = null): Collection
    {
        return Collection::make(
            self::get('models.topicable.allowed.classes', $default)
        );
    }
}
