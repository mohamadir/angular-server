<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Comment;
class BlogController extends Controller
{
    //
    public function getBlogs(Request $request){

        $blogs = Blog::all();
        
        return $blogs;
    }

    public function getBlog(Request $request,$id){

        $blog = Blog::with('comments')->find($id);
        return $blog;
    }

    public function addBlog(Request $request){
        $blog = new Blog();
        $blog->title = $requrest->title;
        $blog->user_id = $requrest->user_id;
        $blog->body = $requrest->body;
        $blog->save();

        return response()->json(
            ['message' => 'success',
             'blog' => $blog])
             ;
    }

    public function getComments(Request $request,$id){
        $blog = Blog::find($id);
        if(!$blog){
            return response()->json(
                ['message' => 'Blog Not Found!']);
        }
        $comments = $blog->comments();
        return response()->json(
            ['message' => 'Success',
            'comments'=> $comments]);

    }
    public function addComment(Request $request,$user_id,$blog_id){
        $blog = Blog::find($blog_id);
        $user = User::find($user_id);
        if(!$blog){
            return response()->json(
                ['message' => 'Blog Not Found!']);
        }
        if(!$user){
            return response()->json(
                ['message' => 'User Not Found!']);
        }
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->blog_id = $blog_id;
        $comment->user_id = $user_id;
        $comment->save();
        
        return response()->json(
            ['message' => 'Comment Added Successfully!']);

    }
    
    public function removeBlog(Request $request,$id){
        $blog = Blog::find($id);
        if(!$blog){
            return response()->json(
                ['message' => 'Blog Not Found!']);
    }
        $blog->delete();
        return response()->json(
            ['message' => 'Blog Removed']);
 
    }
}
