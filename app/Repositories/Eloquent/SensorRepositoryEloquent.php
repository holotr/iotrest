<?php

namespace Someline\Repositories\Eloquent;

use Someline\Repositories\Criteria\RequestCriteria;
use Someline\Repositories\Interfaces\SensorRepository;
use Someline\Models\Sensor;
use Someline\Validators\SensorValidator;
use Someline\Presenters\SensorPresenter;

/**
 * Class SensorRepositoryEloquent
 * @package namespace Someline\Repositories\Eloquent;
 */
class SensorRepositoryEloquent extends BaseRepository implements SensorRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Sensor::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return SensorValidator::class;
    }


    /**
    * Specify Presenter class name
    *
    * @return mixed
    */
    public function presenter()
    {

        return SensorPresenter::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
