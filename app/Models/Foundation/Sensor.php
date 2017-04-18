<?php

namespace Someline\Models\Foundation;

use Someline\Models\BaseModel;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sensor extends BaseModel implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    protected $primaryKey = 'sensor_id';

    protected $fillable = [
      'uuid', 'name', 'type', 'extra','user_id',
    ];

    // Fields to be converted to Carbon object automatically
    protected $hidden = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function record()
    {
        return $this->hasMany(Record::class, 'sensor_id', 'sensor_id');
    }
}
