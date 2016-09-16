<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class getTweet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getTweetService';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get Tweet from all following users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    private function cmp($a, $b) {
        return $a->created_at >= $b->created_at;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        
    }
}
