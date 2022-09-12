<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LikeSystem;

class LikeSystemController extends Controller
{
    //
    public function saveLikes(Request $request)
    {
        $data = new LikeSystem;
        $data->post_id = $request->post;
        if ($request->post_id == 'like') {
            $data->like = 1;
        } else {
            $data->dislike = 1;
        }
        $data->save();
        return response()->json([
            'bool' => true
        ]);
    }
}
