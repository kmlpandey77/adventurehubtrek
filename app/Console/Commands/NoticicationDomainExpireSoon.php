<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class NoticicationDomainExpireSoon extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:DomainExpireSoon';

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
     * @return mixed
     */
    public function handle()
    {
        $date = date('Y-m-d', strtotime('+1 Month'));
        // $date = '2015-11-22';
        $hostings = \App\Hosting::where('expire_at', $date)->get();
        foreach ($hostings as $host) {
            $customer = $host->customer;
            $customer->notify(new \App\Notifications\DomainExpireSoon($host));
        }
    }
}
