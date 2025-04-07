<?php

namespace Yuges\Topicable\Observers;

use Yuges\Topicable\Config\Config;
use Illuminate\Database\Eloquent\Model;

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
