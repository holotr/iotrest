<?php

namespace Someline\Repositories\Eloquent;

use Someline\Repositories\Criteria\RequestCriteria;
use Someline\Repositories\Interfaces\RecordRepository;
use Someline\Models\Foundation\Record;
use Someline\Validators\RecordValidator;
use Someline\Presenters\RecordPresenter;

/**
 * Class RecordRepositoryEloquent
 * @package namespace Someline\Repositories\Eloquent;
 */
class RecordRepositoryEloquent extends BaseRepository implements RecordRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Record::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return RecordValidator::class;
    }


    /**
    * Specify Presenter class name
    *
    * @return mixed
    */
    public function presenter()
    {

        return RecordPresenter::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
