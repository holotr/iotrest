<?php

namespace Tests\Api;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SensorTest extends BaseApiTestCase
{
    public function testGetAllSensors()
    {
        $this->withOAuthTokenTypePassword();
        $this->getApi('sensors');
        $this->printResponseData();
        $this->assertJsonStructure([
            'data' => [
                '*' => [
                    'sensor_id',
                    'uuid',
                    'name',
                    'type',
                    'extra',
                ],
            ]
        ]);
    }

    public function testGetSingleSensor()
    {
        $this->withOAuthTokenTypePassword();
        $this->getApi('sensors/1');
        //$this->assertResponseOk();
        $this->printResponseData();
        $this->assertJsonStructure([
            'data' => [
                    'sensor_id',
                    'uuid',
                    'name',
                    'type',
                    'extra',
                ]
        ]);
    }

    public function testCreateSensor()
    {
        $this->withOAuthTokenTypePassword();
        $this->postApi('sensors', [
            'uuid' => '74445d3e-865c-41c7-aa53-d0281109f2f3',
            'name' => '上肢加速度Test',
            'type' => '加速度传感器',
            'extra' => '这是描述',
        ]);
        $this->printResponseData();
        $this->assertResponseOk();
    }

    public function testUpdateSensor()
    {
        $this->withOAuthTokenTypePassword();
        $this->putApi('sensors/1', [
            'name' => '修改测试传感器',
        ]);
        $this->printResponseData();
        $this->assertResponseNoContent();
    }

    public function testDeleteSensor()
    {
        $sensor = \Someline\Models\Foundation\Sensor::withTrashed()->find(3);
        $sensor_soft_deleted = \Someline\Models\Foundation\Sensor::onlyTrashed()->find(3);
        if (!$sensor) {
            $sensor = factory(\Someline\Models\Foundation\Sensor::class, 1)->make();
            $sensor->sensor_id = 3;
            $sensor->save();
        } elseif (isset($sensor_soft_deleted)) {
            \Someline\Models\Foundation\Sensor::onlyTrashed()->where('sensor_id', 3)->restore();
        }

        $this->withOAuthTokenTypePassword();
        $this->deleteApi('sensors/3');
        $this->printResponseData();
        $this->assertResponseNoContent();
    }

}
