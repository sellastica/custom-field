<?php
namespace Sellastica\CustomField\Mapping;

use Sellastica\CustomField\Entity\IGlobalCustomFieldRepository;
use Sellastica\DataGrid\Mapping\Dibi\TFilterRulesRepositoryProxy;

/**
 * @method \Sellastica\CustomField\Mapping\GlobalCustomFieldRepository getRepository()
 * @see CustomField
 */
class GlobalCustomFieldRepositoryProxy extends \Sellastica\Entity\Mapping\RepositoryProxy implements IGlobalCustomFieldRepository
{
	use TFilterRulesRepositoryProxy;


	public function findCustomField(string $namespace, string $key)
	{
		return $this->getRepository()->findCustomField($namespace, $key);
	}
}