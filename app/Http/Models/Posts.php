<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use SoftDeletes;

    protected $table = 'posts';

    protected $fillable = [
        'uuid', 'name', 'age', 'sex', 'mobile', 'created_at'
    ];

    protected $hidden = ['deleted_at', 'uuid'];

    protected $dates = ['deleted_at'];


    public function lists()
    {
        $rs = Posts::query()->paginate();

        return $rs;
    }
}
