<?php
  
namespace App\Http\Controllers;
  
use Auth;
use Illuminate\Http\Request;
use App\Models\Post;
  
class PostController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {    
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create()
    {
        return view('posts.create');
    }
      
    /**
     * This saves the profile image
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $valiator = $request->validate([
            // 'title' => 'required',
            // 'body' => 'required',
            'image' => 'required',
        ]);

        //destroy the olld listing and make a new one
        $posts = Post::where('user_id', Auth::user()->id)->delete();

        $post = Post::create([
            'user_id' => Auth::user()->id
        ]);
  
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $post->addMediaFromRequest('image')->toMediaCollection('images');
        }


        return redirect()->back()->with('message', "You have updated your profile photo.");
    }
}