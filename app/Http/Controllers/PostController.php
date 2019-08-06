<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Story;
use Auth;
use DB; 

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index' , 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('stories')->join('users' , 'stories.user_id' ,'=' , 'users.id')
        ->select('stories.id' ,'stories.title' , 'stories.description', 'stories.category', 'stories.image' , 'stories.created_at' ,'users.name' ) 
        ->get();
        return view('post.all-post')->with('posts' , $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create-post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'category' => 'required|string',
            'image' => 'image|max:1999',
        ]);
        if (!$validator->fails())
        {
            $story = new Story;
            $story->title = $request->input('title');
            $story->category = $request->input('category');
            $story->description = $request->input('description');
            $story->user_id = Auth::user()->id;
            if($request->hasFile('image'))
            {
                $name = Auth::user()->id.'_'.time().'.'.$request->file('image')->getClientOriginalExtension();
                $story->image = $name;
                $request->file('image')->storeAs('public/images', $name);  
            } 
            $story->save();
            return redirect()->intended(route('posts.index'))->with('success' , 'New Post Created'); 
        }
        return redirect()->intended(route('posts.create'))->withErrors($validator);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Story::find($id);
        return view('post.show-post')->with('post' , $posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Story::find($id);
        return view('post.edit-post')->with('post' , $posts);
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'category' => 'required|string',
            'image' => 'image|max:1999',
        ]);
        if (!$validator->fails())
        {
            $story = Story::find($id);
            $story->title = $request->input('title');
            $story->category = $request->input('category');
            $story->description = $request->input('description');
            if($request->hasFile('image'))
            {
                Storage::delete('public/images/'.$story->image);
                $name = Auth::user()->id.'_'.time().'.'.$request->file('image')->getClientOriginalExtension();
                $story->image = $name;
                $request->file('image')->storeAs('public/images', $name);  
            } 
            $story->save();
            return redirect()->intended(route('posts.index'))->with('success' , 'Post Updated'); 
        }
        return redirect()->intended(route('posts.edit' , $id))->withErrors($validator);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $story = Story::find($id);
        $story->delete();
        return redirect()->intended(route('posts.index'))->with('success' , 'Post Deleted');
    }
}
