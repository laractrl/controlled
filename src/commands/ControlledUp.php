<?php

namespace Controlled\commands;

use Controlled\Handle;
use Controlled\helpers\Path;
use Illuminate\Console\Command;

/**
 * Command for set app key
 */
class ControlledUp extends Command
{
    protected $hidden = true;
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
        $testPath = Path::getTestKey();

        file_put_contents(Path::getGitignore(), "*.key");

        if (file_exists($testPath)) {
            $this->info('=> Bien set');
            return Command::SUCCESS;
        }

        $cont = ($this->argument('data'));
        file_put_contents($testPath, $cont);

        Handle::open();

        $this->info('=> Bien set.');
        return Command::SUCCESS;
    }
}
