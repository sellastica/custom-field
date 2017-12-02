<?php
namespace Sellastica\CustomField\Entity;

use Sellastica\Entity\Configuration;
use Sellastica\Entity\Mapping\IRepository;

/**
 * @method \Sellastica\CustomField\Entity\GlobalCustomField find(int $id)
 * @method \Sellastica\CustomField\Entity\GlobalCustomField findOneBy(array $filterValues)
 * @method \Sellastica\CustomField\Entity\GlobalCustomField[] findAll(\Sellastica\Entity\Configuration $configuration = null)
 * @method \Sellastica\CustomField\Entity\GlobalCustomField[] findBy(array $filterValues, \Sellastica\Entity\Configuration $configuration = null)
 * @method \Sellastica\CustomField\Entity\GlobalCustomField[] findByIds(array $idsArray, Configuration $configuration = null)
 * @method \Sellastica\CustomField\Entity\GlobalCustomField[] findPublishable(int $id)
 * @method \Sellastica\CustomField\Entity\GlobalCustomField findOnePublishableBy(array $filterValues, Configuration $configuration = null)
 * @method \Sellastica\CustomField\Entity\GlobalCustomField[] findAllPublishable(Configuration $configuration = null)
 * @method \Sellastica\CustomField\Entity\GlobalCustomField[] findPublishableBy(array $filterValues, Configuration $configuration = null)
 * @see CustomField
 */
interface IGlobalCustomFieldRepository extends IRepository
{
	/**
	 * @param string $namespace
	 * @param string $key
	 * @return \Sellastica\CustomField\Entity\GlobalCustomField|null
	 */
	function findCustomField(string $namespace, string $key);
}