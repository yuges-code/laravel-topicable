<?php

namespace Yuges\Topicable\Models;

use Yuges\Package\Models\Model;
use Yuges\Topicable\Config\Config;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topic extends Model
{
    use HasFactory;

    protected $table = 'topics';

    protected $guarded = ['id'];

    public function getTable(): string
    {
        return Config::getTopicTable() ?? $this->table;
    }
}
