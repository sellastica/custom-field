<?php
namespace Sellastica\CustomField\Mapping;

use Sellastica\CustomField\Entity\GlobalCustomFieldBuilder;
use Sellastica\CustomField\Entity\GlobalCustomFieldCollection;
use Sellastica\CustomField\Model\CustomFieldType;
use Sellastica\Entity\Entity\EntityCollection;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\IBuilder;

/**
 * @see \Sellastica\CustomField\Entity\GlobalCustomField
 * @property \Sellastica\CustomField\Mapping\GlobalCustomFieldDibiMapper $mapper
 */
class GlobalCustomFieldDao extends \Sellastica\Entity\Mapping\Dao
{
	use \Sellastica\DataGrid\Mapping\Dibi\TFilterRulesDao;


	/**
	 * @inheritDoc
	 */
	protected function getBuilder(
		$data,
		$first = null,
		$second = null
	): IBuilder
	{
		$type = CustomFieldType::from($data->type);
		return GlobalCustomFieldBuilder::create($data->namespace, $data->slug, $type)
			->hydrate($data);
	}

	/**
	 * @param string $namespace
	 * @param string $key
	 * @return IEntity|null
	 */
	public function findCustomField(string $namespace, string $key)
	{
		return $this->find($this->mapper->findCustomField($namespace, $key));
	}

	/**
	 * @return EntityCollection|\Sellastica\CustomField\Entity\GlobalCustomFieldCollection
	 */
	public function getEmptyCollection(): EntityCollection
	{
		return new GlobalCustomFieldCollection();
	}
}