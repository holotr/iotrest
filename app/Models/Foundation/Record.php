<?php

namespace Someline\Models\Foundation;

use Someline\Models\BaseModel;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Someline\Models\Foundation\Sensor;

class Record extends BaseModel implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    protected $primaryKey = 'record_id';

    protected $fillable = ['record','sensor_id'];

    // Fields to be converted to Carbon object automatically
    protected $dates = [];

    public function sensor()
    {
        return $this->belongsTo(Sensor::class, 'sensor_id', 'sensor_id');
    }
}
