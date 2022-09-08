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
class Sf extends \Respect\Annotation\Rules
{
    public function __construct(\Symfony\Component\Validator\Constraint $constraint, ?\Symfony\Component\Validator\Validator\ValidatorInterface $validator = NULL)
    {
        $this->validator = new \Respect\Validation\Rules\Sf($constraint, $validator);
    }
}
