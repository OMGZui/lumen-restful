<?php

namespace App\Http\Controllers\V1;


use App\Http\Controllers\Controller;
use App\Http\Models\Posts;
use App\Transformers\PostsTransformer;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    private $posts;
    public function __construct(Posts $posts)
    {
        $this->posts = $posts;
    }

    public function index()
    {
        $result = $this->posts->lists();

        foreach ($result as $item) {
            $item->sex = $item->sex == 0 ? '男' : '女';
        }

//        return response()->json(['results' => $result]);
        return $this->response->paginator($result,new PostsTransformer());
//        $this->response->error('This is an error.', 444);
    }

    public function show($id)
    {

        $result = $this->posts->newQuery()->find($id);

        return response()->json(['results' => $result]);
    }

    public function update($id)
    {
        $result = $this->posts->newQuery()->where('id',$id)->restore();

        return response()->json(['results' => $result]);
    }

    public function store(Request $request)
    {

    }

    public function destroy($id)
    {
        $result = $this->posts->newQuery()->where('id',$id)->delete();

        return response()->json(['results' => $result]);
    }
}
