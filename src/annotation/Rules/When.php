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
class When extends \Respect\Annotation\Rules
{
    public function __construct(Respect\Validation\Validatable $when, Respect\Validation\Validatable $then, ?Respect\Validation\Validatable $else = NULL)
    {
        $this->validator = new \Respect\Validation\Rules\When($when, $then, $else);
    }
}
