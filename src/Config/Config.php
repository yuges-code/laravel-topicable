<?php

namespace Yuges\Topicable\Config;

use Yuges\Package\Enums\KeyType;
use Yuges\Topicable\Models\Topic;
use Illuminate\Support\Collection;
use Yuges\Topicable\Models\Topicable;
use Yuges\Topicable\Actions\SyncTopicAction;
use Yuges\Topicable\Observers\TopicObserver;
use Yuges\Topicable\Actions\AttachTopicAction;
use Yuges\Topicable\Actions\DetachTopicAction;
use Yuges\Topicable\Observers\TopicableObserver;
use Yuges\Topicable\Interfaces\Topicable as TopicableInterface;

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

    public static function getTopicTable(mixed $default = null): string
    {
        return self::get('models.topic.table', $default);
    }

    /** @return class-string<TopicObserver> */
    public static function getTopicObserverClass(mixed $default = null): string
    {
        return self::get('models.topic.observer', $default);
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

    public static function getTopicableTable(mixed $default = null): string
    {
        return self::get('models.topicable.table', $default);
    }

    /** @return Collection<array-key, class-string<Topicable>> */
    public static function getTopicableAllowedClasses(mixed $default = null): Collection
    {
        return Collection::make(
            self::get('models.topicable.allowed.classes', $default)
        );
    }

    /** @return class-string<TopicableObserver> */
    public static function getTopicableObserverClass(mixed $default = null): string
    {
        return self::get('models.topicable.observer', $default);
    }

    public static function getSyncTopicAction(
        TopicableInterface $topicable,
        mixed $default = null
    ): SyncTopicAction
    {
        return self::getSyncTopicActionClass($default)::create($topicable);
    }

    /** @return class-string<SyncTopicAction> */
    public static function getSyncTopicActionClass(mixed $default = null): string
    {
        return self::get('actions.sync', $default);
    }

    public static function getAttachTopicAction(
        TopicableInterface $topicable,
        mixed $default = null
    ): AttachTopicAction
    {
        return self::getAttachTopicActionClass($default)::create($topicable);
    }

    /** @return class-string<AttachTopicAction> */
    public static function getAttachTopicActionClass(mixed $default = null): string
    {
        return self::get('actions.attach', $default);
    }

    public static function getDetachTopicAction(
        TopicableInterface $topicable,
        mixed $default = null
    ): DetachTopicAction
    {
        return self::getDetachTopicActionClass($default)::create($topicable);
    }

    /** @return class-string<DetachTopicAction> */
    public static function getDetachTopicActionClass(mixed $default = null): string
    {
        return self::get('actions.detach', $default);
    }
}
