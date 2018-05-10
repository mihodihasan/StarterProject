<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Session;

class PostController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
//        $posts=Post::all();
        $posts=Post::orderBy('id','desc')->paginate(2);
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('posts.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //validate
        $this->validate($request,array(
            'title'=>'required|max:255',
            'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'body'=>'required'
        ));

        //store to db
        $post=new Post;
        $post->title=$request->title;
        $post->slug=$request->slug;
        $post->body=$request->body;
        $post->save();
        //show success msg
        Session::flash('success','The Post Is Saved Successfully!');
//        Session::put('success','The Post Is Saved Successfully!');  //Put works for until session ends and flash works for one page request
        //redirect
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $post=Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $post=Post::find($id);
        return view('posts.edit')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $post=Post::find($id);
        if ($request->input('slug')==$post->slug){
            $this->validate($request,array(
                'title'=>'required|max:255',
                'body'=>'required'
            ));
        }else{
            $this->validate($request,array(
                'title'=>'required|max:255',
                'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'body'=>'required'
            ));
        }



        $post->title=$request->input('title');
        $post->slug=$request->input('slug');
        $post->body=$request->input('body');
        $post->save();

        Session::flash('success','Post Updated');

        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $post=Post::find($id);

        $post->delete();

        Session::flash('success','Deleted Successfully!');

        return redirect()->route('posts.index');
    }
}
