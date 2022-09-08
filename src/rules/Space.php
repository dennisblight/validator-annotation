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
class Space
{
    /**
     * @var \Respect\Validation\Validatable $validator
     */
    private $validator;

    /**
     * @return \Respect\Validation\Rules\Space Respect validator object
     */
    public function getValidator(): \Respect\Validation\Validatable
    {
        return $this->validator;
    }

    public function __construct(string ...$additionalChars)
    {
        $this->validator = new \Respect\Validation\Rules\Space(...$additionalChars);
    }
}