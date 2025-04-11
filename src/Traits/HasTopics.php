<?php

namespace Yuges\Topicable\Traits;

use Yuges\Topicable\Models\Topic;
use Yuges\Topicable\Config\Config;
use Illuminate\Support\Collection;
use Yuges\Topicable\Models\Topicable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * @property Collection<array-key, Topic> $topics
 */
trait HasTopics
{
    public function topics(): MorphToMany
    {
        /** @var Model $this */
        return $this
            ->morphToMany(Config::getTopicClass(Topic::class), 'topicable')
            ->using(Config::getTopicableClass(Topicable::class))
            ->withTimestamps();
    }

    public function topic(Topic $topic): static
    {
        return $this->attachTopic($topic);
    }

    public function untopic(Topic $topic): static
    {
        return $this->detachTopic($topic);
    }

    public function attachTopic(Topic $topic): static
    {
        $this->attachTopics(Collection::make([$topic]));

        return $this;
    }

    /**
     * @param Collection<array-key, Topic> $topics
     */
    public function attachTopics(Collection $topics): static
    {
        Config::getAttachTopicAction($this)->execute($topics);

        return $this;
    }

    public function detachTopic(Topic $topic): static
    {
        $this->detachTopics(Collection::make([$topic]));

        return $this;
    }

    /**
     * @param Collection<array-key, Topic> $topics
     */
    public function detachTopics(Collection $topics): static
    {
        Config::getDetachTopicAction($this)->execute($topics);

        return $this;
    }

    /**
     * @param Collection<array-key, Topic> $topics
     */
    public function syncTopics(Collection $topics): static
    {
        Config::getSyncTopicAction($this)->execute($topics);

        return $this;
    }
}
