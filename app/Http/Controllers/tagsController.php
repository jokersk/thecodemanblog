<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tags;
use Log;

class tagsController extends Controller
{
    public function list(){
        $tags = tags::orderBy("id","desc")->get();
        return response()->json(['tags'=>$tags]);
    }

    public function get($tagId)
    {
        $tag = tags::find($tagId);
        return response()->json($tag);
    }


    public function save(Request $request){
        Log::info($request);
        $id = isset($request->id)? $request->id : 0;
        $tag = tags::updateOrCreate(
            ['id'=>$id],
            [
                "name"=>$request->name
            ]
        );
        return response()->json($tag->toArray());
    }

    public function delete($tagId){
        tags::find($tagId)->delete();
    }
}
