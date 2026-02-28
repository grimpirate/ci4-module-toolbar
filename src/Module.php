<?php

namespace Modules\ComposerCollector;

use Michalsn\CodeIgniterModuleManager\BaseModule;

class Module extends BaseModule
{
	protected string $name = 'Composer Collector';
	protected string $description = 'A module for CodeIgniter's debug toolbar that displays information about outdated composer packages';
	protected string $version = '1.0.0';
	protected string $author = 'Grim Pirate';
	protected ?string $url = 'https://github.com/grimpirate/ci4-module-toolbar';
}