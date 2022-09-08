<?php

declare(strict_types=1);

use Respect\Validation\Rules\AbstractComposite;
use Respect\Validation\Rules\AbstractRelated;

require './vendor/autoload.php';

$classTemplate = file_get_contents('./ClassTemplate.template');

function classIterator() {

    $rulesPath = './vendor/respect/validation/library/Rules/*.php';
    foreach(glob($rulesPath) as $path) {

        $className = '\\Respect\\Validation\\Rules\\'
            . substr($path, strlen($rulesPath) - 5, -4);

        $class = new \ReflectionClass($className);
        if($class->isAbstract()) continue;

        $parent = $class->getParentClass()->getName();
        if($parent == AbstractComposite::class) continue;
        if($parent == AbstractRelated::class) continue;

        $resolvedParameters = [];
        $resolvedInvokeParameters = [];
        $constructor = $class->getConstructor();
        if($constructor && $constructor->getNumberOfParameters() > 0) {
            
            foreach($constructor->getParameters() as $index => $param) {
                $name = $param->getName();

                $signature = '';
                $invoke = '';

                $type = $param->getType();
                if($type) {
                    $typeName = $type->getName();
                    if($type->allowsNull()) {
                        $signature .= '?';
                    }

                    if($typeName) {
                        $signature .= $typeName;
                    }

                    $signature .= ' ';
                }

                if($param->isVariadic()) {
                    $signature .= '...';
                    $invoke .= '...';
                }

                $signature .= "\$$name";
                $invoke .= "\$$name";

                if($param->isDefaultValueAvailable()) {
                    $var = var_export($param->getDefaultValue(), true);
                    $var = str_replace(["\r", "\n", " "], ['', '', ''], $var);
                    $signature .= " = $var";
                }

                $resolvedParameters[] = $signature;
                $resolvedInvokeParameters[] = $invoke;
            }
        }

        yield [
            'parameters' => join(', ', $resolvedParameters),
            'invokeParameters' => join(', ', $resolvedInvokeParameters),
            'validatorClass' => '\\' . $class->getName(),
            'className' => $class->getShortName(),
        ];
    }
}

foreach(classIterator() as $item) {
    $classContent = str_replace([
        '{parameters}',
        '{invokeParameters}',
        '{validatorClass}',
        '{className}',
    ], array_values($item), $classTemplate);

    if(!file_exists('./src/rules'))
    {
        mkdir('./src/rules', 0777, true);
    }

    if(file_exists($classFile = './src/rules/' . $item['className'] . '.php'))
    {
        unlink($classFile);
    }

    file_put_contents($classFile, $classContent);
}