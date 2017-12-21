<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use Storage;
use DB;
use URL;
use App\Post;
use App\Category;


class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data= post::all();
        // $data= Post::where('title', 'Title of the post')->get();
        //$data= DB::select('select * from posts');
        //$data= Post::orderBy('title','asc')->take(1)->get();
        $data= Post::orderBy('created_at','desc')->paginate(2);
        return view('posts.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //Handle File Upload
        if($request->hasFile('cover_image')){
            //FileName With Extension
            $fileNameWithExt= $request->file('cover_image')->getClientOriginalName();
            //FileName Only
            $fileName= pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get Just Extension
            $fileExt= $request->file('cover_image')->getClientOriginalExtension();
            //File to upload
            $fileNameToStore=$fileName.'_'.time().'.'.$fileExt;
            //Upload Image
            $path= $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }else{
            $fileNameToStore='noimage.jpg';
        }
        
        //Insert Data in post table
        $post= new Post;
        $post->title        = $request->input('title');
        $post->body         = $request->input('body');
        $post->user_id      = auth()->user()->id;
        $post->cover_image  = $fileNameToStore;
        $post->category     = $request->input('category');
        $post->save();

        //Insert Data in Category table
        $category = Category::firstOrCreate([
            'category'  =>  $request->input('category'),
            'subcat'    =>  'default',
            'user_id'   =>  auth()->user()->id
            ]);
        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data= Post::find($id);
        return view('posts.show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data= Post::find($id);
        return view('posts.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //Handle File Upload
        if($request->hasFile('cover_image')){
            //FileName With Extension
            $fileNameWithExt= $request->file('cover_image')->getClientOriginalName();
            //FileName Only
            $fileName= pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get Just Extension
            $fileExt= $request->file('cover_image')->getClientOriginalExtension();
            //File to upload
            $fileNameToStore=$fileName.'_'.time().'.'.$fileExt;
            //Upload Image
            $path= $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        
        //Insert Data
        $post= Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image= $fileNameToStore;
        }
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);

        //Delete File
        if($post->cover_image != 'noimage.jpg'){
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        $post->delete();
        return redirect('/posts')->with('success','Post Removed');
    }
}
