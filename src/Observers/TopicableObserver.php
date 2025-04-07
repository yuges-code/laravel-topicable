<?php

namespace Yuges\Topicable\Observers;

use Illuminate\Database\Eloquent\Model;
use Yuges\Topicable\Config\Config;

class TopicableObserver
{
    public function saving(Model $model): void
    {
        $classes = Config::getTopicableAllowedClasses();

        /** @todo check allowed classes */
    }

    public function deleted(Model $model): void
    {

    }
}
