# Composer Collector

![Screenshot](https://raw.githubusercontent.com/grimpirate/ci4-module-toolbar/main/screenshot.png "Toolbar")

## Setup
```
git clone --depth 1 --branch main --single-branch https://github.com/grimpirate/ci4-module-toolbar
mv ci4-module-toolbar/src app/modules/composercollector
rm -rf ci4-module-toolbar
```
app/Config/Autoload.php (if not using [Module Manager](https://github.com/michalsn/codeigniter-module-manager) for setup)
```
public $psr4 = [
    'Modules\ComposerCollector' => ROOTPATH . 'modules/composercollector/src',
];
```
## Configuration
.env
```
Modules\ComposerCollector\Config\ComposerCollector.cacheKey='composer_updates';
Modules\ComposerCollector\Config\ComposerCollector.timeToLive=60;
OR
composercollector.cacheKey='composer_updates';
composercollector.timeToLive=60;
```
modules/ComposerCollector/Config/ComposerCollector.php
```
public string $cacheKey = 'composer_updates';
public int $timeToLive = 60;
```
modules/ComposerCollector/Config/Registrar.php
```
<?php

namespace Modules\ComposerCollector\Config;

class Registrar
{
    public static function ComposerCollector(): array
    {
        return [
            'cacheKey' => 'composer_updates',
            'timeToLive' => 60,
        ];
    }
}
```