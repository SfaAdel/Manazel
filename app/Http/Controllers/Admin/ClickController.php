<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ClickController extends Controller
{
    //
    public function registerClick(Request $request)
    {
        $type = $request->input('type');

        DB::table('clicks')->insert([
            'type' => $type,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['success' => true]);
    }
}
