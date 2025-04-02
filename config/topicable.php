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
            'class' => Yuges\Topicable\Models\Topic::class,
        ],
        'topicable' => [
            'key' => KeyType::Ulid,
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
        'create' => Yuges\Subscribable\Actions\CreateSubscriptionAction::class,
        'delete' => Yuges\Subscribable\Actions\DeleteSubscriptionAction::class,
        'toggle' => Yuges\Subscribable\Actions\ToggleSubscriptionAction::class,
    ],
];
