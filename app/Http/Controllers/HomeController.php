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
        $textLines = preg_split("/\\r\\n|\\r|\\n/", $text);
        
        $lastLineKey = array_key_last($textLines);
        
        if (isset($textLines[$lastLineKey - 1])) {
            $previousLine = $textLines[$lastLineKey - 1];
        } else {
            $previousLine = end($textLines);
        }
        
        $previousLine = end($textLines);
        
        $textWords = preg_split('/[\s]+/', $previousLine, - 1, PREG_SPLIT_NO_EMPTY);
        
        $searchWord = end($textWords);
        
        return $this->searchWord($searchWord);
    }
    
    public function test() {
        
        $searchWord = 'адреналинка';
        
        $list = $this->searchWord($searchWord);
        
        var_dump($list);
    }
    
    public function searchWord($searchWord)
    {
        $searchWord = trim($searchWord);
        $searchWord = mb_strtolower($searchWord);
        
        $searchWordIndex1 = $this->getWordIndex1($searchWord);
        $searchWordIndex2 = $this->getWordIndex2($searchWord);
        $searchWordIndex3 = $this->getWordIndex3($searchWord);
        $searchWordIndex4 = $this->getWordIndex4($searchWord);
        $searchWordIndex5 = $this->getWordIndex5($searchWord);
        $searchWordIndex6 = $this->getWordIndex6($searchWord);
        $searchWordIndex7 = $this->getWordIndex7($searchWord);
        $searchWordIndex8 = $this->getWordIndex8($searchWord);
        $searchWordIndex9 = $this->getWordIndex9($searchWord);
        
        $searchRhymes = Word::where('word_index1', $searchWordIndex1)
            ->orWhere('word_index2', $searchWordIndex2)
            ->orWhere('word_index3', $searchWordIndex3)
            ->orWhere('word_index4', $searchWordIndex4)
            ->orWhere('word_index5', $searchWordIndex5)
            ->orWhere('word_index6', $searchWordIndex6)
            ->orWhere('word_index7', $searchWordIndex7)
            ->orWhere('word_index8', $searchWordIndex8)
            ->orWhere('word_index9', $searchWordIndex9)
        ->get();
        
        $bestRhymesWords = array();
        foreach($searchRhymes as $rhymeWord) {
            
            if ($rhymeWord->word == $searchWord) {
                continue;
            }
            
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
            
            if ($rhymeWord->word_index8 == $searchWordIndex8) {
                $points = $points + 2;
            }
            
            if ($points > 2) {
                
                $checkForSmallWord = $rhymeWord->word_index2;
                $checkForSmallWord = str_replace($rhymeWord->word_index2, false, $rhymeWord->word);
                $checkForSmallWord = mb_strlen($checkForSmallWord);
                
                if ($checkForSmallWord == 2) {
                    $points = $points + 2;
                } else if ($checkForSmallWord == 1) {
                    $points = $points + 3;
                }
            }
            
            if ($points == 0) {
                continue;
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
