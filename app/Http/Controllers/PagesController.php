<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller {
    public function getIndex() {
        $posts=Post::orderBy('created_at','desc')->limit(4)->get();
        return view('pages.welcome')->withPosts($posts);
    }

    public function getAbout() {

        $firstName='Mihodi Hasan';
        $lastName='Lushan';
        $full=$firstName." ".$lastName;
        $email='mihodihasan@gmail.com';
        $data=[];
        $data['email']='mihodihasan@gmail.com';
        $data['name']='Mihodi Hasan';
//        return view('pages/about')->withfullname($full)->withEmail($email);
        return view('pages/about')->withData($data);
//        return view('pages/about')->withFullname($full);      //works same as above line, shortcut of with function 2 params
//        return view('pages/about')->with("fullname",$full);
    }

    public function getContact() {
        # return "Hello Contact Page";
        return view('pages.contact');
    }
}
