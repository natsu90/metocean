<?php

use Illuminate\Database\Seeder;
use App\MetoceanDescription;

class MetoceanDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// truncate table
    	MetoceanDescription::truncate();
        // read description
        $start_read = false;
        foreach(file(storage_path('app/metocean.txt')) as $line) {
            // assign $start_read and skip
            if (trim($line) == '>') {
                $start_read = true;
                continue;
            }

            if ($start_read) {
                // end of line
                if (trim($line) == '')
                    break;
                
                $description_data = explode(' : ', $line);

                MetoceanDescription::create([
                	'code' => trim($description_data[0]),
                	'description' => trim($description_data[1])
                ]);
            }
        }
    }
}
