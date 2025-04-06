<?php

namespace Yuges\Topicable\Interfaces;

use Yuges\Topicable\Models\Topic;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

interface Topicable
{
    public function topics(): MorphToMany;

    public function topic(Topic $topic): static;

    public function untopic(Topic $topic): static;

    public function attachTopic(Topic $topic): static;

    public function attachTopics(Collection $topics): static;

    public function detachTopic(Topic $topic): static;

    public function detachTopics(Collection $topics): static;

    public function syncTopics(Collection $topics): static;
}
