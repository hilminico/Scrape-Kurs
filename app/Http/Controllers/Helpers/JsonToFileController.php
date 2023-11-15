<?php

namespace App\Http\Controllers\Helpers;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class JsonToFileController extends Controller
{
    //
    public static function saveFile($json){
        $now = Carbon::now()->setTimezone('Asia/Jakarta');
        $fileName = $now->format('d-m-Y--h-m-s');
        
        Storage::disk('public')->put('rate-'.$fileName.'.json', $json);
    }

}
