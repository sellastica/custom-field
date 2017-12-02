<?php
namespace Sellastica\CustomField\Presentation;

use Nette\Utils\JsonException;
use Sellastica\Twig\Model\ProxyEntity;

/**
 * {@inheritdoc}
 * @property \Sellastica\CustomField\Entity\GlobalCustomField $parent
 */
class GlobalCustomFieldProxy extends ProxyEntity
{
	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->parent->getId();
	}

	/**
	 * @return string
	 */
	public function getNamespace(): string
	{
		return $this->parent->getNamespace();
	}

	/**
	 * @return string
	 */
	public function getSlug(): string
	{
		return $this->parent->getSlug();
	}

	/**
	 * @return null|string
	 */
	public function getTitle()
	{
		return $this->parent->getTitle();
	}

	/**
	 * @return mixed
	 * @throws \Twig_Error_Runtime
	 */
	public function getValue()
	{
		try {
			return $this->parent->getResolvedValue();
		} catch (JsonException $e) {
			throw new \Twig_Error_Runtime('Invalid json');
		}
	}

	/**
	 * @return string
	 */
	public function __toString(): string
	{
		return (string)$this->getValue();
	}

	/**
	 * @return string
	 */
	public function getShortName(): string
	{
		return 'custom_field';
	}

	/**
	 * @return array
	 */
	public function getAllowedProperties(): array
	{
		return [
			'id',
			'namespace',
			'title',
			'slug',
			'title',
			'value',
		];
	}
}