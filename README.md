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
Modules\Toolbar\Config\Toolbar.timeToLive=60;
OR
toolbar.timeToLive=60;
```
modules/Toolbar/Config/Toolbar.php
```
public int $timeToLive = 60;
```
modules/AbuseIpdb/Config/Registrar.php
```
<?php

namespace Modules\Toolbar\Config;

class Registrar
{
    public static function Toolbar(): array
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
    'Modules\Toolbar' => ROOTPATH . 'modules/Toolbar',
];
```
