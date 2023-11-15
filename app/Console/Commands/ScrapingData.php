<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Scraper;

class ScrapingData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:scraping-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scraping data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $scrap = new Scraper();
        $scrap->getScrape();
        
    }
}
