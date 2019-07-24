<?php
namespace App;

trait WordIndex {
    
    public function getWordIndex1($word) {
        
        $lastSixLetters = mb_substr($word, -6);
        
        return $lastSixLetters;
    }
    
    public function getWordIndex2($word) {
        
        $lastFiveLetters = mb_substr($word, -5);
        
        return $lastFiveLetters;
    }
    
    public function getWordIndex3($word) {
        
        $lastForLetters = mb_substr($word, -4);
        
        return $lastForLetters;
    }
    
    public function getWordIndex4($word) {
        
        $lastThreeLetters = mb_substr($word, -3);
        
        return $lastThreeLetters;
    }
    
    public function getWordIndex5($word) {
        
        $firstFiveLetters = mb_substr($word, 0, 5);
        
        return $firstFiveLetters;
    }
    
    public function getWordIndex6($word) {
        
        $firstFourLetters = mb_substr($word, 0, 4);
        
        return $firstFourLetters;
    }
    
    public function getWordIndex7($word) {
        
        $firstThreeLetters = mb_substr($word, 0, 3);
        
        return $firstThreeLetters;
    }
    
    public function getWordIndex8($word) {
        
        // бп вф гк дт жш
        
        $word = str_replace('б','п',$word);
        $word = str_replace('в','ф',$word);
        $word = str_replace('г','к',$word);
        $word = str_replace('д','т',$word);
        $word = str_replace('ж','ш',$word);
        
        $lastForLetters = mb_substr($word, -4);
        
        return $lastForLetters; 
        
    }
    
    public function getWordIndex9($word) {
        
        // бп вф гк дт жш
        
        $word = str_replace('п','б',$word);
        $word = str_replace('ф','в',$word);
        $word = str_replace('к','г',$word);
        $word = str_replace('т','д',$word);
        $word = str_replace('ш','ж',$word);
        
        $lastForLetters = mb_substr($word, -4);
        
        return $lastForLetters;
        
    }
    
    public function removeRepeatableLetters($word) {
        
        $word = str_replace('нн','н',$word);
        $word = str_replace('тт','т',$word);
        $word = str_replace('й','и',$word);
        
        return $word;
    }
}