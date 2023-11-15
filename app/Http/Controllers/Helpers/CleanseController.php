<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CleanseController extends Controller
{
    public static function cleanse( $inputString){
        $clean = new CleanseController();

        $inputString = $clean->removeNonAscii($inputString);
        $inputString = $clean->removeParentheses($inputString);
        $inputString = $clean->removeDoubleSpace($inputString);
        $inputString = $clean->divideStringToWord($inputString);
        return $inputString;
    }

    // Remove non asci character
    private function removeNonAscii($inputString){
        $cleanedString = preg_replace('/[^\x20-\x7E]/u', '', $inputString);
        return $cleanedString;
    }

    // Remove char () and value inside it
    private function removeParentheses($inputString){
        $stringWithoutParentheses = preg_replace("/\([^)]+\)/", '', $inputString);
        return $stringWithoutParentheses;
    }

    // Remove double space
    private function removeDoubleSpace($inputString){
        $cleanedStringWithoutDoubleSpace = preg_replace('/\s+/', ' ', $inputString);
        return $cleanedStringWithoutDoubleSpace;
    }

    // exploade string into word 
    private function divideStringToWord($inputString){
        $stringToWord = explode(' ', $inputString);
        return $stringToWord;
    }

}
