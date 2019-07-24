<?php
namespace App;

class SaveWordsToDatabase
{
    public function save() {
        
        $wordList = file_get_contents(storage_path('bg-words.txt'));
        $words = preg_split('/[\s]+/', $wordList, - 1, PREG_SPLIT_NO_EMPTY);
        
        foreach ($words as $word) {
            
            $word = mb_strtolower($word);
            
            $findWord = Word::where('word', $word)->first();
            if ($findWord) {
                
                echo 'Update word: ' . $word  . PHP_EOL;
                
                $findWord->word = $word;
                
                $findWord->word_index1 = $this->getWordIndex1($word);
                $findWord->word_index2 = $this->getWordIndex2($word);
                $findWord->word_index3 = $this->getWordIndex3($word);
                $findWord->word_index4 = $this->getWordIndex4($word);
                $findWord->word_index5 = $this->getWordIndex5($word);
                $findWord->word_index6 = $this->getWordIndex6($word);
                $findWord->word_index7 = $this->getWordIndex7($word);
                
                $findWord->save();
                
            } else {
                
                echo 'Save word: ' . $word  . PHP_EOL;
                
                $newWord = new Word();
                $newWord->word = $word;
                $newWord->save();
            }
        }
    }
    
    
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
}