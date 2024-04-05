<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\LuwesData;
use Carbon\Carbon;

class GetDataFromLuwesApi extends Command
{
    protected $signature = 'luwes:getdata';

    protected $description = 'Get data from LuwesWaterSensor API and save it to database';

    public function handle()
    {
        $response = Http::asForm()->post('http://data3.luweswatersensor.com:8002/last', [
            'a' => 'stat',
            'imei' => '869556066072316'
        ]);

        $data = $response->json();

        LuwesData::create([
            'id' => $data['id'],
            'imei' => $data['imei'],
            'level_sensor' => $data['level_sensor'],
            'name' => $data['name'],
            'rec' => $data['rec'],
            'submitted_at' => Carbon::parse($data['submitted_at'])->toDateTimeString()
        ]);

        $this->info('Data from LuwesWaterSensor API has been retrieved and saved to database.');
    }
}
