<?php

namespace Yuges\Topicable\Actions;

use Yuges\Topicable\Models\Topic;
use Illuminate\Support\Collection;
use Yuges\Topicable\Config\Config;
use Yuges\Topicable\Interfaces\Topicable;

class AttachTopicAction
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

        $topics = Config::getTopicClass(Topic::class)::query()->getQuery()->whereIn('id', $ids)->get();

        $this->topicable->topics()->sync($topics->pluck('id'), false);

        return $this->topicable;
    }
}
