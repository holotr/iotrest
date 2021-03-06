<?php

namespace Someline\Api\Controllers;

use Dingo\Api\Exception\DeleteResourceFailedException;
use Dingo\Api\Exception\StoreResourceFailedException;
use Dingo\Api\Exception\UpdateResourceFailedException;
use Prettus\Validator\Contracts\ValidatorInterface;
use Someline\Http\Requests\RecordCreateRequest;
use Someline\Http\Requests\RecordUpdateRequest;
use Someline\Repositories\Interfaces\RecordRepository;
use Someline\Validators\RecordValidator;
use Illuminate\Support\Facades\Gate;
use Someline\Models\Foundation\Sensor;

class RecordsController extends BaseController
{

    /**
     * @var RecordRepository
     */
    protected $repository;

    /**
     * @var RecordValidator
     */
    protected $validator;

    public function __construct(RecordRepository $repository, RecordValidator $validator,Sensor $sensor)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->sensor = $sensor;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->repository->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RecordCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store($sensorId,RecordCreateRequest $request)
    {
      $sensor = $this->sensor->find($sensorId);
      if (! $sensor) {
          return $this->response->errorNotFound();
      }
      if (Gate::denies('store', $sensor)) {
        abort(401);
      }
        $data = $request->all();

        $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);

        //$data['record'] = $data;
        $data['sensor_id'] = $sensorId;

        $record = $this->repository->create($data);

        // throw exception if store failed
//        throw new StoreResourceFailedException('Failed to store.');

        // A. return 201 created
//        return $this->response->created(null);

        // B. return data
        return $record;
        //return $data;

    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->repository->scopeQuery(function($query)use($id){
            return $query->where('sensor_id',"=",$id);
          })->paginate(10);
        //return $this->repository->findByField('sensor_id',$id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  RecordUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(RecordUpdateRequest $request, $id)
    {

        $data = $request->all();

        $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);

        $record = $this->repository->update($data, $id);

        // throw exception if update failed
//        throw new UpdateResourceFailedException('Failed to update.');

        // Updated, return 204 No Content
        return $this->response->noContent();

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if ($deleted) {
            // Deleted, return 204 No Content
            return $this->response->noContent();
        } else {
            // Failed, throw exception
            throw new DeleteResourceFailedException('Failed to delete.');
        }
    }
}
