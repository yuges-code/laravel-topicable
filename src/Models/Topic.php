<?php

namespace Yuges\Topicable\Models;

use Yuges\Package\Models\Model;
use Yuges\Topicable\Config\Config;
use Yuges\Sluggable\Traits\HasSlug;
use Yuges\Topicable\Traits\HasParent;
use Yuges\Sluggable\Options\SlugOptions;
use Yuges\Sluggable\Interfaces\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property string $name
 * @property string $slug
 * @property null|string $type
 */
class Topic extends Model implements Sluggable
{
    use HasFactory, HasParent, HasSlug;

    protected $table = 'topics';

    protected $guarded = ['id'];

    public function getTable(): string
    {
        return Config::getTopicTable() ?? $this->table;
    }

    public function sluggable(): SlugOptions
    {
        $options = new SlugOptions();

        $options->column = 'slug';
        $options->separator = '-';
        $options->source = ['name'];
        $options->union = [];

        return $options;
    }
}
