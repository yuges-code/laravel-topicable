<?php

namespace Yuges\Topicable\Providers;

use Yuges\Package\Data\Package;
use Yuges\Topicable\Models\Topic;
use Yuges\Topicable\Config\Config;
use Yuges\Topicable\Models\Topicable;
use Yuges\Topicable\Observers\TopicObserver;
use Yuges\Topicable\Exceptions\InvalidTopic;
use Yuges\Topicable\Observers\TopicableObserver;
use Yuges\Topicable\Exceptions\InvalidTopicable;
use Yuges\Package\Providers\PackageServiceProvider;

class TopicableServiceProvider extends PackageServiceProvider
{
    protected string $name = 'laravel-topicable';

    public function configure(Package $package): void
    {
        $topic = Config::getTopicClass(Topic::class);
        $topicable = Config::getTopicableClass(Topicable::class);

        if (! is_a($topic, Topic::class, true)) {
            throw InvalidTopic::doesNotImplementTopic($topic);
        }

        if (! is_a($topicable, Topicable::class, true)) {
            throw InvalidTopicable::doesNotImplementTopicable($topicable);
        }

        $package
            ->hasName($this->name)
            ->hasConfig('topicable')
            ->hasMigrations([
                '000_create_topics_table',
                '001_create_topicables_table',
            ])
            ->hasObserver($topic, Config::getTopicObserverClass(TopicObserver::class))
            ->hasObserver($topicable, Config::getTopicableObserverClass(TopicableObserver::class));
    }
}
