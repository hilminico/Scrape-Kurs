<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scraper;

class ScraperController extends Controller
{
    public static function store(){
        $scrap = new Scraper();
        $scrap->getScrape();

        return "berhasil";
    }

    public static function deleteAll(){
        $scrap = new Scraper();
        $scrap->deleteAll();

        return response(["message" => "berhasil"],200);
    }

}
