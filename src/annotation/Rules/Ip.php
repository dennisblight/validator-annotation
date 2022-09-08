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
class Ip extends \Respect\Annotation\Rules
{
    public function __construct(string $range = '*', ?int $options = NULL)
    {
        $this->validator = new \Respect\Validation\Rules\Ip($range, $options);
    }
}
