<?php

namespace Modules\ComposerCollector\Config;

class Registrar
{
    public static function Toolbar(): array
    {
        return [
            'collectors' => [
                \Modules\ComposerCollector\Collectors\ComposerCollector::class,
            ],
        ];
    }
}