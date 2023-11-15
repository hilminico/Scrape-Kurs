<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Goutte\Client;

class MetaController extends Controller
{
    //
    public static function getMeta(){
        $client = new Client();
        $now = Carbon::now()->setTimezone('Asia/Jakarta');
        
        $website = $client->request('GET', 'https://kursdollar.org');
        $metaTime = $website->filter('table > tr')->eq(1)->each(function ($node){

            $tr = $node->filter('td')->each(function ($node1){

                $td =  $node1->text();

                return $td;
            });

            return $tr;
        });

        $responseMeta = [
            "date" => $now->format('d-m-Y'),
            "day" => $now->format('l'),
            "indonesia" => $metaTime[0][1],
            "word" => $metaTime[0][2],
        ];

        return $responseMeta;
    }

}
