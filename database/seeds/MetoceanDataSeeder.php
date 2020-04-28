<?php

use Illuminate\Database\Seeder;
use App\MetoceanDescription;
use App\MetoceanData;

class MetoceanDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// truncate
    	MetoceanData::truncate();
    	// get table fields
    	$table_fields = MetoceanDescription::select('code')->get()->pluck('code')->toArray();
        // read data
        $start_read = false;
        foreach(file(storage_path('app/metocean.txt')) as $line) {
            // skip first blank
            if (trim($line) == '')
                continue;

            // skip header line
            if (!$start_read) {
                $start_read = true;
                continue;
            }

            // end of line
            if (trim($line) == '>')
                break;
            // process line
            if ($start_read) {
            	// split by blank space
                $data = preg_split('/\s+/', trim($line));
                // get data except datetime
                $new_data = array_splice($data, 2);
                // assign array key to value
                $create_data = array_combine($table_fields, $new_data);
                $create_data['datetime'] = $data[0]. ' '.$data[1];

                MetoceanData::create($create_data);
            }
        }
    }
}
