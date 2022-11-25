<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\AshramVisitorRepository;

class CheckOutDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'checkout:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used when user is not checkout after 24 hours';

    private $ashramVisitorRepository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->ashramVisitorRepository = new AshramVisitorRepository;
    }  

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->ashramVisitorRepository->dailyCheckOut();

        $this->info('Check in successfully');

        return Command::SUCCESS;
    }
}
