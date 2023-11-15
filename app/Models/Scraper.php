<?php

namespace App\Models;

use App\Http\Controllers\Helpers\CleanseController;
use App\Http\Controllers\Helpers\MetaController;
use App\Http\Controllers\Helpers\JsonToFileController;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Filesystem\Filesystem;

use Goutte\Client;

class Scraper extends Model
{
    use HasFactory;

    public function getScrape(){
        $client = new Client();
        $website = $client->request('GET', 'https://kursdollar.org');
        
        // get data kurs
        $rates = $website->filter('table > tr')->slice(3,20)->each(function ($node){
            $td =  $node->text();

            $word = CleanseController::cleanse($td);

            $data = [
                "currency" => $word[0],
                "buy" => $word[1],
                "sell" => $word[2],
                "average" => $word[3],
                "word_rate" => $word[4],
            ];

            return $data;
        });

        $meta = MetaController::getMeta();

        $dataJson = [
            "meta" => $meta,
            "rates" => $rates
        ];

        $json = json_encode($dataJson);

        JsonToFileController::saveFile($json);
    }

    public function deleteAll(){
        $file = new Filesystem;
        $file->cleanDirectory('storage/');
    }

}
