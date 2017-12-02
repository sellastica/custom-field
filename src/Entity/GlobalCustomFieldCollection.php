<?php
namespace Sellastica\CustomField\Entity;

use Sellastica\Entity\Entity\EntityCollection;

/**
 * @property GlobalCustomField[] $items
 * @method GlobalCustomFieldCollection add($entity)
 * @method GlobalCustomFieldCollection remove($key)
 * @method GlobalCustomField|mixed getEntity(int $entityId, $default = null)
 * @method GlobalCustomField|mixed getBy(string $property, $value, $default = null)
 */
class GlobalCustomFieldCollection extends EntityCollection
{
}