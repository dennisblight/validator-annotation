<?php

declare(strict_types=1);

namespace Respect\Annotation\Rules;

use Doctrine\Common\Annotations\Annotation;
use Doctrine\Common\Annotations\Annotation\NamedArgumentConstructor;
use Doctrine\Common\Annotations\Annotation\Target;

/**
 * @Annotation
 * @NamedArgumentConstructor
 * @Target("PROPERTY")
 */
class Equals
{
    /**
     * @var \Respect\Validation\Validatable $validator
     */
    private $validator;

    /**
     * @return \Respect\Validation\Rules\Equals Respect validator object
     */
    public function getValidator(): \Respect\Validation\Validatable
    {
        return $this->validator;
    }

    public function __construct($compareTo)
    {
        $this->validator = new \Respect\Validation\Rules\Equals($compareTo);
    }
}