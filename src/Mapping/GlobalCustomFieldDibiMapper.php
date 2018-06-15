<?php
namespace Sellastica\CustomField\Mapping;

/**
 * @see \Sellastica\CustomField\Entity\GlobalCustomField
 */
class GlobalCustomFieldDibiMapper extends \Sellastica\Entity\Mapping\DibiMapper
{
	use \Sellastica\DataGrid\Mapping\Dibi\TFilterRulesDibiMapper;

	/**
	 * @param string $namespace
	 * @param string $slug
	 * @return int|false
	 */
	public function findCustomField(string $namespace, string $slug)
	{
		return $this->getResourceWithIds()
			->where('[namespace] = %s', $namespace)
			->where('[slug] = %s', $slug)
			->fetchSingle();
	}
}