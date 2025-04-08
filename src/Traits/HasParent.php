<?php

namespace Yuges\Topicable\Traits;

use Yuges\Topicable\Models\Topic;
use Yuges\Topicable\Config\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property null|int|string $parent_id
 * 
 * @property Collection<array-key, Topic> $nested
 * @property Collection<array-key, Topic> $topics
 * @property Collection<array-key, Topic> $children
 */
trait HasParent
{
    public function nested(): HasMany
    {
        return $this->children();
    }

    public function topics(): HasMany
    {
        return $this->children();
    }

    public function children(): HasMany
    {
        /** @var Model $this */
        return $this->hasMany(Config::getTopicClass(Topic::class), 'parent_id');
    }

    public function isParentless(): bool
    {
        return ! $this->parent_id;
    }
}
