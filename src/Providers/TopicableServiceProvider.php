<?php

namespace Yuges\Topicable\Providers;

use Yuges\Package\Data\Package;
use Yuges\Topicable\Models\Topic;
use Vendor\Template\Config\Config;
use Yuges\Topicable\Observers\TopicObserver;
use Yuges\Topicable\Exceptions\InvalidTopic;
use Yuges\Package\Providers\PackageServiceProvider;

class TopicableServiceProvider extends PackageServiceProvider
{
    protected string $name = 'laravel-topicable';

    public function configure(Package $package): void
    {
        $topic = Config::getTemplateClass(Topic::class);

        if (! is_a($topic, Topic::class, true)) {
            throw InvalidTopic::doesNotImplementTopic($topic);
        }

        $package
            ->hasName($this->name)
            ->hasConfig('topicable')
            ->hasMigrations([
                '000_create_topics_table',
                '001_create_topicables_table',
            ])
            ->hasObserver($topic, TopicObserver::class);
    }
}
