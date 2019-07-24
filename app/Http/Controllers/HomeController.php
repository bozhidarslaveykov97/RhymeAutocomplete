<?php
namespace App\Http\Controllers;

use App\WordIndex;
use App\Word;

class HomeController extends Controller
{
    use WordIndex;
    
    public function index()
    {
        
        $searchWord = 'божидар';
        
        $searchWordIndex1 = $this->getWordIndex1($searchWord);
        $searchWordIndex2 = $this->getWordIndex2($searchWord);
        $searchWordIndex3 = $this->getWordIndex3($searchWord);
        $searchWordIndex4 = $this->getWordIndex4($searchWord);
        $searchWordIndex5 = $this->getWordIndex5($searchWord);
        $searchWordIndex6 = $this->getWordIndex6($searchWord);
        $searchWordIndex7 = $this->getWordIndex7($searchWord);
        
        $searchRhymes = Word::where('word_index1', $searchWordIndex1)
            ->orWhere('word_index2', $searchWordIndex2)
            ->orWhere('word_index3', $searchWordIndex3)
            ->orWhere('word_index4', $searchWordIndex4)
            ->orWhere('word_index5', $searchWordIndex5)
            ->orWhere('word_index6', $searchWordIndex6)
            ->orWhere('word_index7', $searchWordIndex7)->get();
        $searchRhymesWords = array();
        foreach($searchRhymes as $rhymeWord) {
            $searchRhymesWords[] = $rhymeWord;
        }
            
        dd($searchRhymesWords);
        
        
        
        // return view('home');
    }
}
