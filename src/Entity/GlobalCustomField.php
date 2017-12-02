<?php
namespace Sellastica\CustomField\Entity;

use Sellastica\Api\Model\IPayloadable;
use Sellastica\CustomField\Model\CustomFieldType;
use Sellastica\Entity\Entity\TAbstractEntity;
use Sellastica\Twig\Model\IProxable;
use Sellastica\Twig\Model\ProxyConverter;
use Sellastica\CustomField\Presentation\GlobalCustomFieldProxy;

/**
 * @generate-builder
 * @see GlobalCustomFieldBuilder
 */
class GlobalCustomField extends \Sellastica\Entity\Entity\AbstractEntity implements IPayloadable, IProxable
{
	use TAbstractEntity;

	/** @var string @required */
	private $namespace;
	/** @var string @required */
	private $slug;
	/** @var \Sellastica\CustomField\Model\CustomFieldType @required */
	private $type;
	/** @var string|null @optional */
	private $title;
	/** @var string|null @optional */
	private $value;


	/**
	 * @param \Sellastica\CustomField\Entity\GlobalCustomFieldBuilder $builder
	 */
	public function __construct(\Sellastica\CustomField\Entity\GlobalCustomFieldBuilder $builder)
	{
		$this->hydrate($builder);
	}

	/**
	 * @return string
	 */
	public function getNamespace(): string
	{
		return $this->namespace;
	}

	/**
	 * @param string $namespace
	 */
	public function setNamespace(string $namespace)
	{
		$this->namespace = $namespace;
	}

	/**
	 * @return string
	 */
	public function getSlug(): string
	{
		return $this->slug;
	}

	/**
	 * @param string $slug
	 */
	public function setSlug(string $slug)
	{
		$this->slug = $slug;
	}

	/**
	 * @return \Sellastica\CustomField\Model\CustomFieldType
	 */
	public function getType(): CustomFieldType
	{
		return $this->type;
	}

	/**
	 * @param CustomFieldType $type
	 */
	public function setType(CustomFieldType $type)
	{
		$this->type = $type;
	}

	/**
	 * @return null|string
	 */
	public function getTitle(): ?string
	{
		return $this->title;
	}

	/**
	 * @return null|string
	 */
	public function getValue(): ?string
	{
		return $this->value;
	}

	/**
	 * @param null|string $value
	 */
	public function setValue(?string $value)
	{
		$this->value = $value;
	}

	/**
	 * @return array|int|string
	 */
	public function getResolvedValue()
	{
		return CustomFieldType::resolve($this->value, $this->type);
	}

	/**
	 * @return string
	 */
	public function __toString(): string
	{
		return (string)$this->value;
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return [
			'id' => $this->id,
			'namespace' => $this->namespace,
			'type' => $this->type->getType(),
			'title' => $this->title,
			'slug' => $this->slug,
			'value' => $this->value,
		];
	}

	/**
	 * @return \Api\Payload\CustomField
	 */
	public function toPayloadObject()
	{
//		return new \Api\Payload\CustomField($this);
	}

	/**
	 * @return GlobalCustomFieldProxy
	 */
	public function toProxy(): GlobalCustomFieldProxy
	{
		return ProxyConverter::convert($this, GlobalCustomFieldProxy::class);
	}
}