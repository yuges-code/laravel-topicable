<?php

namespace Yuges\Topicable\Models;

use Yuges\Package\Models\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topic extends Model
{
    use HasFactory;

    protected $table = 'topics';

    protected $guarded = ['id'];
}
