<?php
namespace App\Http\Controllers;

class HomeController extends Controller
{

    public function index()
    {
        
        $word = 'Божидар';
        
        $lastThreeLetters = mb_substr($word, 0, 4);
        
        echo $lastThreeLetters;
        
        // return view('home');
    }
}
