<?php

namespace Someline\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class SensorValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
          'uuid' => 'required|string',
          'name' => 'required|string',
          'type' => 'required|string',
          'extra' => 'string',
        ],
        ValidatorInterface::RULE_UPDATE => [
          'uuid' => 'string',
          'name' => 'string',
          'type' => 'string',
          'extra' => 'string',
        ],
   ];
}
