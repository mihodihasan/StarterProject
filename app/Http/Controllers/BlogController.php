<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class BlogController extends Controller
{
    protected function getSingle($slug){
        $post=Post::where('slug','=',$slug)->get()->first();

        return view('blog.single')->withPost($post);
    }
}
