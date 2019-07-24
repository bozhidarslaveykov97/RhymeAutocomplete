<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\SaveWordsToDatabase;

class SaveWordList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'save-word-list:save';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Read and save words.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        set_time_limit(0);
        
        $save = new SaveWordsToDatabase();
        $save->save();
        
    }
}
