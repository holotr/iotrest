<?php

namespace Someline\Transformers;

use Someline\Models\Foundation\Sensor;

/**
 * Class SensorTransformer
 * @package namespace Someline\Transformers;
 */
class SensorTransformer extends BaseTransformer
{

    protected $availableIncludes = ['user', 'record'];

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
            //'user_id' => (int) $model->user_id,

            /* place your other model properties here */
            'uuid' => $model->uuid,
            'name' => $model->name,
            'type' => $model->type,
            'extra' => $model->extra,

            'created_at' => (string) $model->created_at,
            'updated_at' => (string) $model->updated_at
        ];
    }

    public function includeRecord(Sensor $sensor)
    {
        $limit = 20;
        $record = $sensor->record()->limit($limit)->get();
        $total = $sensor->record()->count();
        $user = auth_user()->getUserId();
        //$record = $model->record;
        return $this->collection($record, new RecordTransformer())->setMeta(['total' => $total,'user_id'=> $user],['user_id'=> $user]);
    }
}
