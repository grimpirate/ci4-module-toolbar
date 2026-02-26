<?php

namespace Modules\ComposerCollector\Config;

use CodeIgniter\Config\BaseConfig;

class ComposerCollector extends BaseConfig
{
	public string $cacheKey = 'composer_updates';
	public int $timeToLive = 60;
}