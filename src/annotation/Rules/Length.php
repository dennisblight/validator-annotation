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
class Length extends \Respect\Annotation\Rules
{
    public function __construct(?int $min = NULL, ?int $max = NULL, bool $inclusive = true)
    {
        $this->validator = new \Respect\Validation\Rules\Length($min, $max, $inclusive);
    }
}
