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
app/Config/Autoload.php
```
public $psr4 = [
    'Modules\Toolbar' => ROOTPATH . 'modules/Toolbar',
];
```
