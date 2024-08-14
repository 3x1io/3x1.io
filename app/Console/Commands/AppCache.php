<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class AppCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Artisan::call('config:cache');
        $this->info('Config cache cleared');
        Artisan::call('route:cache');
        $this->info('Route cache cleared');
        Artisan::call('view:cache');
        $this->info('View cache cleared');
        Artisan::call('event:cache');
        $this->info('Event cache cleared');
        Artisan::call('icons:cache');
        $this->info('Icons cache cleared');
        Artisan::call('filament:cache-components');
        $this->info('Filament components cache cleared');
        Artisan::call('optimize');
        $this->info('Application cache cleared');
    }
}
