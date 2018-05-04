<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller {
    public function getIndex() {
        return view('pages.welcome');
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
