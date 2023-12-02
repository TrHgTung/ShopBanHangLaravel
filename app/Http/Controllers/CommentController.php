<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use App\Slider;
use Illuminate\Support\Facades\Redirect;

session_start();  

class CommentController extends Controller
{
    public function index(Request $request){
        $data = array();
        $data['rating'] = $request->rating;
        $data['content'] = $request->content;
        
        DB::table('tbl_comment')->insert($data);

        return Redirect::to('/');
    }
}
