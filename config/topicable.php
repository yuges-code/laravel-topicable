<?php

// Config for vendor/topicable

use Yuges\Package\Enums\KeyType;

return [
    /*
     * FQCN (Fully Qualified Class Name) of the models to use for subscriptions
     */
    'models' => [
        'topic' => [
            'key' => KeyType::Ulid,
            'table' => 'topics',
            'class' => Yuges\Topicable\Models\Topic::class,
        ],
        'topicable' => [
            'key' => KeyType::Ulid,
            'table' => 'topicables',
            'class' => Yuges\Topicable\Models\Topicable::class,
            'allowed' => [
                'classes' => [
                    # models...
                ],
            ],
        ],
    ],

    'permissions' => [],

    'actions' => [
        'sync' => Yuges\Topicable\Actions\SyncTopicAction::class,
        'attach' => Yuges\Topicable\Actions\AttachTopicAction::class,
        'detach' => Yuges\Topicable\Actions\DetachTopicAction::class,
    ],
];
