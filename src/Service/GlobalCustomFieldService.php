<?php
namespace Sellastica\CustomField\Service;

class GlobalCustomFieldService
{
	/** @var \Sellastica\Entity\EntityManager */
	private $em;


	/**
	 * @param \Sellastica\Entity\EntityManager $em
	 */
	public function __construct(\Sellastica\Entity\EntityManager $em)
	{
		$this->em = $em;
	}

	/**
	 * @param array $filter
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return \Sellastica\CustomField\Entity\GlobalCustomFieldCollection|\Sellastica\CustomField\Entity\GlobalCustomField[]
	 */
	public function findBy(
		array $filter,
		\Sellastica\Entity\Configuration $configuration = null
	): \Sellastica\CustomField\Entity\GlobalCustomFieldCollection
	{
		return $this->em->getRepository(\Sellastica\CustomField\Entity\GlobalCustomField::class)->findBy(
			$filter, $configuration
		);
	}

	/**
	 * @param string $namespace
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return \Sellastica\CustomField\Entity\GlobalCustomFieldCollection
	 */
	public function findByNamespace(
		string $namespace,
		\Sellastica\Entity\Configuration $configuration = null
	): \Sellastica\CustomField\Entity\GlobalCustomFieldCollection
	{
		return $this->findBy(
			['namespace' => $namespace],
			$configuration
		);
	}
}