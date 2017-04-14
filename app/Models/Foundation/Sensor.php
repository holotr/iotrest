<?php

namespace Someline\Models\Foundation;

use Someline\Models\BaseModel;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Sensor extends BaseModel implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    protected $primaryKey = 'sensor_id';

    protected $fillable = [
      'uuid', 'name', 'type', 'extra',
    ];

    // Fields to be converted to Carbon object automatically
    protected $dates = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function record()
    {
        return $this->hasMany(SensorData::class);
    }
}
