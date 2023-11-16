<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scraper;

class ScraperController extends Controller
{
    public static function store(){
        try{
            $scrap = new Scraper();
            $scrap->getScrape();
    
            return "berhasil";
    
        }catch(\Exception $e){
            return response($e->getMessage());
        }
    }

    public static function deleteAll(){
        try{
            $scrap = new Scraper();
            $scrap->deleteAll();
    
            return response(["message" => "berhasil"],200);
        }catch(\Exception $e){
            return response($e->getMessage());
        }
    }

}
