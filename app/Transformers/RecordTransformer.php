<?php

namespace Someline\Transformers;

use Someline\Models\Foundation\Record;

/**
 * Class RecordTransformer
 * @package namespace Someline\Transformers;
 */
class RecordTransformer extends BaseTransformer
{

    /**
     * Transform the Record entity
     * @param Record $model
     *
     * @return array
     */
    public function transform(Record $model)
    {
        return [
            'record_id' => (int) $model->record_id,
            'sensor_id' => (int) $model->sensor_id,

            /* place your other model properties here */
            'record' => (string) $model->record,

            'created_at' => (string) $model->created_at,
            'updated_at' => (string) $model->updated_at
        ];
    }
}
