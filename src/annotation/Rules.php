<?php

namespace Respect\Annotation;

use Respect\Validation\Validatable;

abstract class Rules
{
    /**
     * @var Validatable $validator
     */
    protected $validator;

    /**
     * @var Validatable $validator
     */
    public function getValidator(): Validatable
    {
        return $this->validator;
    }
}