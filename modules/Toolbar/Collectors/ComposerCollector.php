<?php

namespace Modules\ComposerCollector\Collectors;

use Modules\ComposerCollector\Config\ComposerCollector as ComposerCollectorConfig;

use CodeIgniter\Debug\ComposerCollector\Collectors\BaseCollector;

class ComposerCollector extends BaseCollector
{
	protected $hasTimeline = false;
	protected $hasTabContent = true;
	protected $hasVarData = false;
	protected $title = 'Composer';

	protected $updates = [];
	protected $count = 0;

	public function __construct()
	{
		$this->updates = cache()->remember('composer_updates', config(ComposerCollectorConfig::class)->timeToLive, function(){
			exec("composer outdated -D -A -f json -d " . dirname(COMPOSER_PATH) . '/..', $output);
			return json_decode(implode("", $output), true)['installed'];
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
		return 'data:image/svg+xml;base64,' . base64_encode(lang('Collectors.composer.icon'));
	}

	public function getBadgeValue(): int
	{
		return $this->count;
	}

	public function getTitleDetails(): string
	{
        return $this->count > 1
            ? lang('Collectors.composer.plural', ['count' => $this->count])
            : lang('Collectors.composer.singular', ['count' => $this->count]);
	}

	public function isEmpty(): bool
	{
		return $this->count == 0;
	}

}

