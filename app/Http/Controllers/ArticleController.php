<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ArticleController extends Controller
{
    /**
     * 显示文章列表。
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $rpc = app("rpc");
        $result = $rpc("Article.List", ['count' => 10]);
        return response()->json($result);
    }

    /**
     * 显示文章详情。
     *
     * @return Response
     */
    public function show(Request $request, $id)
    {
        $rpc = app("rpc");
        $result = $rpc("Article.Get", ['id' => intval($id)]);
        return response()->json($result);
    }

}
