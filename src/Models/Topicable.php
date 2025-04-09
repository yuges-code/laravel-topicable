<?php

namespace Yuges\Topicable\Models;

use Yuges\Topicable\Config\Config;
use Yuges\Package\Traits\HasTable;
use Yuges\Package\Traits\HasTimestamps;
use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topicable extends MorphPivot
{
    use HasFactory, HasTable, HasTimestamps;

    protected $table = 'topicables';

    protected $guarded = [];

    public function getTable(): string
    {
        return Config::getTopicableTable() ?? $this->table;
    }
}
