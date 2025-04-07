<?php

// Config for vendor/topicable

use Yuges\Package\Enums\KeyType;
use Yuges\Topicable\Observers\TopicObserver;
use Yuges\Topicable\Observers\TopicableObserver;

return [
    /*
     * FQCN (Fully Qualified Class Name) of the models to use for subscriptions
     */
    'models' => [
        'topic' => [
            'key' => KeyType::BigInteger,
            'table' => 'topics',
            'class' => Yuges\Topicable\Models\Topic::class,
            'observer' => TopicObserver::class,
        ],
        'topicable' => [
            'key' => KeyType::BigInteger,
            'table' => 'topicables',
            'class' => Yuges\Topicable\Models\Topicable::class,
            'allowed' => [
                'classes' => [
                    # models...
                ],
            ],
            'observer' => TopicableObserver::class,
        ],
    ],

    'permissions' => [],

    'actions' => [
        'sync' => Yuges\Topicable\Actions\SyncTopicAction::class,
        'attach' => Yuges\Topicable\Actions\AttachTopicAction::class,
        'detach' => Yuges\Topicable\Actions\DetachTopicAction::class,
    ],
];
