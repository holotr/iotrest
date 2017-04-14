<?php

namespace Someline\Transformers;

use Someline\Models\Foundation\Sensor;

/**
 * Class SensorTransformer
 * @package namespace Someline\Transformers;
 */
class SensorTransformer extends BaseTransformer
{

    /**
     * Transform the Sensor entity
     * @param Sensor $model
     *
     * @return array
     */
    public function transform(Sensor $model)
    {
        return [
            'sensor_id' => (int) $model->sensor_id,

            /* place your other model properties here */
            'uuid' => $model->uuid,
            'name' => $model->name,
            'type' => $model->type,
            'extra' => $model->extra,

            'created_at' => (string) $model->created_at,
            'updated_at' => (string) $model->updated_at
        ];
    }
}
