<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
       return view('pages.index');
    }
    public function about(){
        return view('pages.about');
    }
    public function services(){
        $title1 = 'INDEX';
        $title2 = 'ABOUT';
        $title3 = 'SERVICES';
        // $data=array(
        //     'name'=>'Ashutosh',
        //     'friends'=> ['vijay','uday','neeraj']
        // );
        $title4 =array(
            'ashutosh',
            'vijay'
        );
        return view('pages.services', compact('title1','title2','title3','title4'));
    }
}
