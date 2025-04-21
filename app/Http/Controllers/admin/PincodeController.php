<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PincodeController extends Controller {
    public function getLocation(Request $request)
    {
        $pincode = $request->pincode;

        $data = DB::table('countries')
            ->where('pincode', $pincode)
            ->first();

        if ($data) {
            return response()->json([
                'id' => $data->id,
                'city' => $data->city,
                'name' => $data->name,
            ]);
        } else {
            return response()->json([
                'city' => null,
                'name' => null,
            ]);
        }
    }



}
