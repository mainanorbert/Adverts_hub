<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearCacheCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clears All cache Files';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('cache:clear');
        $this->call('config:clear');
        $this->call('view:clear');
        $this->call('optimize');
        
        return Command::SUCCESS;
    }
}
