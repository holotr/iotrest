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
            'id' => (int) $model->id,

            /* place your other model properties here */
            'user_id' => $model->user_id,
            'name' => $model->name,

            'created_at' => (string) $model->created_at,
            'updated_at' => (string) $model->updated_at
        ];
    }
}
