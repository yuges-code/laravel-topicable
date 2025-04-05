<?php

namespace Yuges\Topicable\Models;

use Yuges\Package\Traits\HasTable;
use Yuges\Topicable\Config\Config;
use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topicable extends MorphPivot
{
    use HasFactory, HasTable;

    protected $table = 'topicables';

    protected $guarded = [];

    public function getTable(): string
    {
        return Config::getTopicableTable() ?? $this->table;
    }
}
