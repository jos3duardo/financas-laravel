<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receitas extends Model
{
    use SoftDeletes;

    protected $dates = ['data_lancamento'];
    protected $fillable = [
       'data_lancamento',
       'valor',
       'name',
       'user_id'
    ];
    public function categoria()
    {
        return $this->belongsTo('App\Category');

    }
}
