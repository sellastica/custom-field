<?php
namespace Sellastica\CustomField\Bridge\DI;

use Nette;

class CustomFieldExtension extends Nette\DI\CompilerExtension
{
	public function loadConfiguration()
	{
		$this->compiler->loadDefinitions(
			$this->getContainerBuilder(),
			$this->loadFromFile(__DIR__ . '/config.neon')['services'],
			$this->name
		);
	}
}
