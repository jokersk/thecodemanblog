<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blogs;
use Markdown;
use App\Models\comments;
use Illuminate\Support\Facades\Log;

class blogsController extends Controller
{
    public function list(){
        $blogs = blogs::all();
        return view('blogs/lists',[
            'blogs'=>$blogs
        ]);
    }

    public function postComment(Request $request){
    //    Log::info($request);
        $comments = new comments();
        $comments->blogs_id = $request->blodId;
        $comments->user_id = 0;
        $comments->body = $request->body;
        $comments->ip_address = \Request::getClientIp(true);
        $comments->save();

        return response()->json(["message"=>"save success!"]);
    }

    public function getComments($blogId){
        $comments = comments::where("blogs_id",$blogId)->orderBy('created_at',"desc")->get();
        return response()->json($comments->toArray());
    }

    public function detail($id = null){
        $blog = false;
        $blog = blogs::find($id);
        return view('blogs/detail',[
            'blog'=>$blog
        ]);                                                                                                                
    }

    public function create(Request $request){
        if($request->id){
            $blog = blogs::find($request->id);    
            $blog->update(
                [
                    'title'=>$request->title,
                    'content'=> stripslashes($request->content)
                ]
                
            );
        }else
        {
            $blog = blogs::create($request->all());
        }
        
        return redirect("blogs/detail/{$blog->id}");
    }

    public function updateStatus($blogId,$status){
        $blog = blogs::find($blogId);
        $blog->status = $status;
        $blog->save();
    }
}
