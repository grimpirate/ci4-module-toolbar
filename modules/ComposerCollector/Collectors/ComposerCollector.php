<?php

namespace Modules\ComposerCollector\Collectors;

use Modules\ComposerCollector\Config\ComposerCollector as ComposerCollectorConfig;

use CodeIgniter\I18n\Time;
use CodeIgniter\Debug\Toolbar\Collectors\BaseCollector;

class ComposerCollector extends BaseCollector
{
	protected $hasTimeline = false;
	protected $hasTabContent = true;
	protected $hasVarData = false;

	protected array $updates = [];
	protected int $count = 0;
	protected ComposerCollectorConfig $config;

	public function __construct()
	{
		$this->config = config(ComposerCollectorConfig::class);
		$this->title = lang('Collectors.composer.title');
		$this->updates = cache()->remember($this->config->cacheKey, $this->config->timeToLive, function(){
			exec("composer outdated -D -A -f json -d " . dirname(COMPOSER_PATH) . '/..', $output);
			return array_map(function($data) {
				return array_filter($data, fn($key) => match($key) {
					'name', 'version', 'latest' => true,
					default => false,
				}, ARRAY_FILTER_USE_KEY);
			}, json_decode(implode("", $output), true)['installed']);
		});
		$this->count = count($this->updates);
	}

	public function display(): string
	{
		$table = new \CodeIgniter\View\Table();
		$table
			->setHeading([
				'name' => lang('Collectors.composer.name'),
				'version' => lang('Collectors.composer.version'),
				'latest' => lang('Collectors.composer.latest'),
			])
			->setSyncRowsWithHeading(true);
		return $table->generate($this->updates);
	}

	public function icon(): string
	{
		return lang('Collectors.composer.icon');
	}

	public function getBadgeValue(): int
	{
		return $this->count;
	}

	public function getTitleDetails(): string
	{
		return lang('Collectors.composer.' . ($this->count == 1 ? 'singular' : 'plural'), [
			'count' => $this->count,
			'mtime' => (new Time())->setTimestamp(cache()->getMetadata($this->config->cacheKey)['mtime']),
		]);
	}

	public function isEmpty(): bool
	{
		return $this->count == 0;
	}

}

