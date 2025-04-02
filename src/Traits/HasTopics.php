<?php

namespace Yuges\Topicable\Traits;

use Yuges\Topicable\Models\Topic;
use Yuges\Topicable\Config\Config;
use Illuminate\Support\Collection;
use Yuges\Topicable\Models\Topicable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasTopics
{
    public function topics(): MorphToMany
    {
        /** @var Model $this */
        return $this
            ->morphToMany(Config::getTopicClass(Topic::class), 'topicable')
            ->using(Config::getTopicableClass(Topicable::class));
    }

    public function attachTopic(Topic $topic): static
    {
        $this->attachTopics(Collection::make($topic));

        return $this;
    }

    public function attachTopics(Collection $topics): static
    {
        $this->topics()->attach($topics->pluck('id')->toArray());

        return $this;
    }

    public function detachTopic(Topic $topic): static
    {
        $this->detachTopics(Collection::make($topic));

        return $this;
    }

    public function detachTopics(Collection $topics): static
    {
        $this->topics()->detach($topics->pluck('id')->toArray());

        return $this;
    }

    public function syncTopics(Collection $topics): static
    {
        $this->topics()->sync($topics->pluck('id')->toArray());

        return $this;
    }
}
