<?php

namespace Yuges\Topicable\Models;

use Yuges\Package\Models\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topicable extends Model
{
    use HasFactory;

    protected $table = 'topicables';
}
