<?php
/**
 * Created by PhpStorm.
 * User: shengj
 * Date: 2017/11/24
 * Time: 16:45
 */

namespace App\Transformers;

use App\Http\Models\Posts;
use League\Fractal\TransformerAbstract;

class PostsTransformer extends TransformerAbstract
{
    public function transform(Posts $posts)
    {
        return $posts->attributesToArray();
    }

}