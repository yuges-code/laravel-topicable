<?php

namespace Yuges\Topicable\Actions;

use Yuges\Topicable\Models\Topic;
use Illuminate\Support\Collection;
use Yuges\Topicable\Interfaces\Topicable;

class DetachTopicAction
{
    public function __construct(
        protected Topicable $topicable
    ) {
    }

    public static function create(Topicable $topicable): self
    {
        return new static($topicable);
    }

    /**
     * @param Collection<array-key, Topic> $topics
     */
    public function execute(Collection $topics): Topicable
    {
        $ids = $topics
            ->map(function (Topic $topic) {
                return $topic->id;
            })
            ->filter(function (mixed $value) {
                return (bool) $value;
            });

        $this->topicable->topics()->detach($ids);

        return $this->topicable;
    }
}
