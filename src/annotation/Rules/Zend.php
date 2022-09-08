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
class Zend extends \Respect\Annotation\Rules
{
    public function __construct($validator, array $params = array())
    {
        $this->validator = new \Respect\Validation\Rules\Zend($validator, $params);
    }
}
