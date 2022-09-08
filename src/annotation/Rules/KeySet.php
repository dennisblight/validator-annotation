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
class KeySet extends \Respect\Annotation\Rules
{
    public function __construct(Respect\Validation\Validatable ...$validatables)
    {
        $this->validator = new \Respect\Validation\Rules\KeySet(...$validatables);
    }
}
