<?php
namespace Sellastica\CustomField\Entity;

use Sellastica\Entity\Entity\EntityFactory;
use Sellastica\Entity\IBuilder;

/**
 * @method GlobalCustomField build(IBuilder $builder, bool $initialize = true, int $assignedId = null)
 * @see CustomField
 */
class GlobalCustomFieldFactory extends EntityFactory
{
	/**
	 * @param \Sellastica\Entity\Entity\IEntity $entity
	 */
	public function doInitialize(\Sellastica\Entity\Entity\IEntity $entity)
	{
	}

	/**
	 * @return string
	 */
	public function getEntityClass(): string
	{
		return GlobalCustomField::class;
	}
}