<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Despesas extends Model
{
    use SoftDeletes;

    protected $dates = ['data_lancamento'];
    protected $fillable = [
        'data_lancamento',
        'valor',
        'name',
        'user_id',
        'category_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria()
    {
//        return $this->belongsTo('App\Category');
        return $this->belongsTo(Category::class);

    }
}
