<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;


class AutocompleteController extends Controller
{
    /**
     * Autocomplete suggestion for category search in create post page
     */
    public function CategorySearch(Request $request)
    {
        $search = $request->term;
        $post = Category::where('category','LIKE','%'.$search.'%')
                        // ->orWhere('body','LIKE','%'.$search.'%')
                        ->get();

        $data=array();
        /**
         *  concated with value |." : ".$value->title|
         */
        foreach ($post as $key => $value) {
            $data [] = [ 'id'=>$value->id, 'value'=>$value->category ];
        }
        if (empty($data)) {
            $data []= [ 'label'=>"No value found", 'value'=>-1 ];
        }
        return response($data);
    }
}
