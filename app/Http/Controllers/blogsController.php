<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blogs;
use Markdown;


class blogsController extends Controller
{
    public function list(){
        $blogs = blogs::all();
        return view('blogs/lists',[
            'blogs'=>$blogs
        ]);
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
}
