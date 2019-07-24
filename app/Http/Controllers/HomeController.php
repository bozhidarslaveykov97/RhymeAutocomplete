<?php
namespace App\Http\Controllers;

use App\WordIndex;
use App\Word;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use WordIndex;
    
    public function index()
    {
        return view('home');    
    }
    
    public function search(Request $request)
    {
        $text = trim($request->input('text'));
        $textWords = preg_split('/[\s]+/', $text, - 1, PREG_SPLIT_NO_EMPTY);
        
        $searchWord = end($textWords);
        
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
        
        $bestRhymesWords = array();
        foreach($searchRhymes as $rhymeWord) {
            
            $points = 0;
            
            if ($rhymeWord->word_index1 == $searchWordIndex1) {
                $points++;
            }
            
            if ($rhymeWord->word_index2 == $searchWordIndex2) {
                $points++;
            }
            
            if ($rhymeWord->word_index3 == $searchWordIndex3) {
                $points++;
            }
            
            if ($rhymeWord->word_index4 == $searchWordIndex4) {
                $points++;
            }
            
            if ($rhymeWord->word_index5 == $searchWordIndex5) {
               // $points++;
            }
            
            if ($rhymeWord->word_index6 == $searchWordIndex6) {
                //$points++;
            }
            
            if ($rhymeWord->word_index7 == $searchWordIndex7) {
                //$points++;
            }
            
            $bestRhymesWords[] = array(
                'points'=>$points,
                'fontSize'=>$points + 2,
                'word'=>$rhymeWord->word
            );
            
        }
        
        arsort($bestRhymesWords);
        
       return $bestRhymesWords;
       
    }
}
