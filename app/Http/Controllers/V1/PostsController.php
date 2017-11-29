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

        return $this->response->paginator($result,new PostsTransformer());
    }

    public function show($id)
    {

        $result = $this->posts->newQuery()->find($id);

        return $this->sendResponse($result,200);
    }

    public function update($id)
    {
        $result = $this->posts->newQuery()->where('id',$id)->restore();

        return $this->sendResponse($result,200);
    }

    public function store(Request $request)
    {

    }

    public function destroy($id)
    {
        $result = $this->posts->newQuery()->where('id',$id)->delete();

        return $this->sendResponse($result,200);
    }
}
