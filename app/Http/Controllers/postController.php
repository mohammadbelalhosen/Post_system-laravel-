<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class postController extends Controller
{
    // for view home section 
    public function home()
    {
        return view('post_system');
    }
    // for view or redirect all post page 
    public function allPost()
    {

        //*all data fetch from post model
        $posts = Post::latest()->simplePaginate(5);
        return view('post_all', compact('posts'));  //compact method use for passing data to another page
    }

    //for form submission 
    public function post(Request $request)
    {
        //    dd($request->all());

        //*validatation 
        $request->validate(
            [
                'title' => 'required|string|max:20',
                'detail' => 'required|string'
            ],
            [
                'title.required' => 'Please Enter Title 😊'
            ]
        );

        //*crud operation insert all data
        $posts = new Post();
        $posts->title = $request->title;
        $posts->detail = $request->detail;
        $posts->save();
        return back()->with('success', 'Post is submit successfully😊');
    }

    //creat this method for edit post
    public function editPost($id)
    {
        //* fetch one data form post model 
        $post = Post::find($id);
        return view('edit_post', compact('post'));
    }

    //*this method is creat for upate post data
    public function updatePost(Request $request, $id)
    {
        //*validation
        $request->validate([
            'title' => 'required',
            'detail' => 'required'
        ]);

        //*update  data 
        $post = Post::find($id);
        $post->title = $request->title;
        $post->detail = $request->detail;
        $post->save();

        //*redirect page and create session
        return redirect()->route('post.allPost')->with('success', 'post update successfully');
    }

    //*this method create for delete post
    public function deletePost($id)
    {
        $post = Post::find($id);
        //*delete post data
        $post->delete();

        //*redirect and create session
        return redirect()->route('post.allPost')->with('success', 'Post Deleted Successfully');
    }
}
