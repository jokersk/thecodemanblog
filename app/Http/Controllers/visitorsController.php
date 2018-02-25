<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\visitors;

class visitorsController extends Controller
{
    public function saveVisitor(Request $request){
        $ip = \Request::getClientIp(true);
        $url  = $request->sendUrl;
        $visitor = new  visitors();
        $visitor->ip_address = $ip;
        $visitor->url = $url;
        $visitor->save();
        return response()->json(['success'=>"true"]);
    }
}
