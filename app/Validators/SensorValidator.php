<?php

namespace Someline\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class SensorValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
          'name' => 'required',
          'type' => 'required',
        ],
        ValidatorInterface::RULE_UPDATE => [],
   ];
}
