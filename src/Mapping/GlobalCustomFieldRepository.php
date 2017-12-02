<?php
namespace Sellastica\CustomField\Mapping;

use Sellastica\CustomField\Entity\GlobalCustomField;
use Sellastica\CustomField\Entity\IGlobalCustomFieldRepository;
use Sellastica\DataGrid\Mapping\TFilterRulesRepository;

/**
 * @property \Sellastica\CustomField\Mapping\GlobalCustomFieldDao $dao
 * @see \Sellastica\CustomField\Entity\GlobalCustomField
 */
class GlobalCustomFieldRepository extends \Sellastica\Entity\Mapping\Repository implements IGlobalCustomFieldRepository
{
	use TFilterRulesRepository;


	/**
	 * @param string $namespace
	 * @param string $key
	 * @return \Sellastica\Entity\Entity\IEntity|null
	 */
	public function findCustomField(string $namespace, string $key)
	{
		return $this->initialize($this->dao->findCustomField($namespace, $key));
	}
}