<?php

namespace Someline\Http\Controllers;


class SensorController extends BaseController
{

    public function getSensorList()
    {
        return view('app.sensors.sensor_list');
    }

    public function getSensorDetail($id)
    {
        return view('app.sensors.sensor_detail', [
            'sensor_id' => $id,
        ]);
    }

}
