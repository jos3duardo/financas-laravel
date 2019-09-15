<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class category
 * @package App
 */
class Category extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name','user_id',
    ];
}
