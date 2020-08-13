<?php

namespace Jubilee\Click108\Console\Commands;

use Illuminate\Console\Command;
use Jubilee\Click108\Services\ConstellationsDetectorService;

class DetectorConstellations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'detector:constellations';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is excavate twelve constellations at current day';

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
    public function handle(ConstellationsDetectorService $service)
    {
        $service->mine();

        return;
    }
}
