<?php

namespace App\Http\Controllers;

use App\Md5;
use Illuminate\Http\Request;

class Md5Controller extends Controller
{
    public function search(Request $request)
    {
        $md5 = $request->request->get('md5');

        if (empty($md5)) {
            return response()->json([
                "status" => 1,
                "message" => "MD5不可为空",
            ]);
        }

        $raw_array = Md5::where('md5', $md5)->first();
        if ($raw_array) {

            $raw = $raw_array->raw;
            return response()->json([
                "status" => 0,
                "message" => $raw,
            ]);

        }

        return response()->json([
            "status" => 0,
            "message" => "无结果",
        ]);
    }
}
