<?php

namespace App\Http\Controllers;


use App\Http\Models\Posts;
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

        return response()->json(['results' => $result]);
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
