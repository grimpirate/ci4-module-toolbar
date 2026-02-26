# Toolbar
A Composer Collector for CodeIgniter's debug toolbar that displays information about outdated packages.

![Screenshot](https://raw.githubusercontent.com/grimpirate/ci4-module-toolbar/main/screenshot.png "Toolbar")

## Setup
~
```
git clone --depth 1 --branch main --single-branch https://github.com/grimpirate/ci4-module-toolbar
mv ci4-module-toolbar/modules .
rm -rf ci4-module-toolbar
```
.env
```
Modules\ComposerCollector\Config\ComposerCollector.timeToLive=60;
OR
composercollector.timeToLive=60;
```
modules/ComposerCollector/Config/ComposerCollector.php
```
public int $timeToLive = 60;
```
modules/AbuseIpdb/Config/Registrar.php
```
<?php

namespace Modules\ComposerCollector\Config;

class Registrar
{
    public static function ComposerCollector(): array
    {
        return [
            'timeToLive' => 60,
        ];
    }
}
```
app/Config/Autoload.php
```
public $psr4 = [
    'Modules\ComposerCollector' => ROOTPATH . 'modules/ComposerCollector',
];
```
