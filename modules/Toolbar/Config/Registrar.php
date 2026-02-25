<?php

namespace Modules\Toolbar\Config;

class Registrar
{
    public static function Toolbar(): array
    {
        return [
            'collectors' => [
                \Modules\Toolbar\Collectors\ComposerCollector::class,
            ],
        ];
    }
}