<?php

namespace Controlled\commands;

use Illuminate\Console\Command;

class ControlledUp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'controlled:up {data}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $testPath = base_path('tests\test.key');

        file_put_contents(base_path('tests\.gitignore'), "*.key");

        file_put_contents(base_path('tests\data.key'), "A");

        // if (file_exists($testPath)) {
        //     $this->info('=> Bien set');
        //     return Command::SUCCESS;
        // }
        
        $cont = ($this->argument('data'));
        file_put_contents($testPath, $cont);

        file_put_contents(base_path('tests\data.key'), "A");

        $this->info('=> Bien set.');
        return Command::SUCCESS;
    }
}
