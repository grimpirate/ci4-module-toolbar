<?php

namespace Modules\ComposerCollector\Config;

class Registrar
{
    public static function ComposerCollector(): array
    {
        return [
            'collectors' => [
                \Modules\ComposerCollector\Collectors\ComposerCollector::class,
            ],
        ];
    }
}