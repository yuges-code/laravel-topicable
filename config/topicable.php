<?php

// Config for yuges/topicable

return [
    /*
     * FQCN (Fully Qualified Class Name) of the models to use for topics
     */
    'models' => [
        'topic' => [
            'table' => 'topics',
            'key' => Yuges\Package\Enums\KeyType::BigInteger,
            'class' => Yuges\Topicable\Models\Topic::class,
            'observer' => Yuges\Topicable\Observers\TopicObserver::class,
        ],
        'topicable' => [
            'table' => 'topicables',
            'key' => Yuges\Package\Enums\KeyType::BigInteger,
            'class' => Yuges\Topicable\Models\Topicable::class,
            'allowed' => [
                'classes' => [
                    # models...
                ],
            ],
            'observer' => Yuges\Topicable\Observers\TopicableObserver::class,
        ],
    ],

    'permissions' => [],

    'actions' => [
        'sync' => Yuges\Topicable\Actions\SyncTopicAction::class,
        'attach' => Yuges\Topicable\Actions\AttachTopicAction::class,
        'detach' => Yuges\Topicable\Actions\DetachTopicAction::class,
    ],
];
