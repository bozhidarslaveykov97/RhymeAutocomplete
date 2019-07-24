<?php
namespace App;

class SaveWordsToDatabase
{
    use WordIndex;
    
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
    
}