<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Curl;
use Mail;


class fetch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:get';

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
        // $response = Curl::to('https://www.undone.com')
        // ->returnResponseObject()
        // ->get();

        Mail::send('email.warn', [], function($message) 
        {
                $message
                    ->to('situ@undone.com', 'situ')
                    ->subject('undone server is down!');
        });


        
    }
}
