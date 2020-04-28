<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\MetoceanDescription;

class TestData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:data';

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
        // // read description
        // $start_read = false;
        // foreach(file(storage_path('app/metocean.txt')) as $line) {
        //     // assign $start_read and skip
        //     if (strpos($line, '>') !== false) {
        //         $start_read = true;
        //         continue;
        //     }

        //     if ($start_read) {
        //         // end of line
        //         if (trim($line) == '')
        //             break;

        //         // $this->info($line);
        //         $description_data = explode(' : ', $line);

        //         $this->info($description_data[0]);
        //         $this->info($description_data[1]);

        //     }
        // }

        // // read data
        // $start_read = false;
        // foreach(file(storage_path('app/metocean.txt')) as $line) {
        //     // skip first blank
        //     if (trim($line) == '')
        //         continue;

        //     // skip first line
        //     if (!$start_read) {
        //         $start_read = true;
        //         continue;
        //     }

        //     // end of line
        //     if (trim($line) == '>')
        //         break;

        //     if ($start_read) {
        //         $data = preg_split('/\s+/', $line);

        //         foreach ($data as $value) {
                   
        //             $this->info($value);
        //         }
        //     }
        // }

        $table_fields = MetoceanDescription::select('code')->get()->pluck('code');

        var_dump($table_fields->toArray());
    }
}
