<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\MetoceanDescription;

class CreateMetoceanDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table_fields = MetoceanDescription::select('code')->get()->pluck('code')->toArray();

        Schema::create('metocean_data', function (Blueprint $table) use ($table_fields) {
            $table->id();
            $table->timestamps();

            $table->dateTime('datetime');

            foreach($table_fields as $field) {
                $table->double($field, 8, 2);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('metocean_data');
    }
}
