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
class Yes extends \Respect\Annotation\Rules
{
    public function __construct(bool $useLocale = false)
    {
        $this->validator = new \Respect\Validation\Rules\Yes($useLocale);
    }
}
