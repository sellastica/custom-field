<?php
namespace Sellastica\CustomField\Entity;

use Sellastica\CustomField\Model\CustomFieldType;
use Sellastica\Entity\TBuilder;

/**
 * @see GlobalCustomField
 */
class GlobalCustomFieldBuilder implements \Sellastica\Entity\IBuilder
{
	use TBuilder;

	/** @var string */
	private $namespace;
	/** @var string */
	private $slug;
	/** @var CustomFieldType */
	private $type;
	/** @var string|null */
	private $title;
	/** @var string|null */
	private $value;

	/**
	 * @param string $namespace
	 * @param string $slug
	 * @param \Sellastica\CustomField\Model\CustomFieldType $type
	 */
	public function __construct(
		string $namespace,
		string $slug,
		CustomFieldType $type
	)
	{
		$this->namespace = $namespace;
		$this->slug = $slug;
		$this->type = $type;
	}

	/**
	 * @return string
	 */
	public function getNamespace(): string
	{
		return $this->namespace;
	}

	/**
	 * @return string
	 */
	public function getSlug(): string
	{
		return $this->slug;
	}

	/**
	 * @return \Sellastica\CustomField\Model\CustomFieldType
	 */
	public function getType(): \Sellastica\CustomField\Model\CustomFieldType
	{
		return $this->type;
	}

	/**
	 * @return string|null
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param string|null $title
	 * @return $this
	 */
	public function title(string $title = null)
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getValue()
	{
		return $this->value;
	}

	/**
	 * @param string|null $value
	 * @return $this
	 */
	public function value(string $value = null)
	{
		$this->value = $value;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function generateId(): bool
	{
		return !GlobalCustomField::isIdGeneratedByStorage();
	}

	/**
	 * @return GlobalCustomField
	 */
	public function build(): GlobalCustomField
	{
		return new GlobalCustomField($this);
	}

	/**
	 * @param string $namespace
	 * @param string $slug
	 * @param \Sellastica\CustomField\Model\CustomFieldType $type
	 * @return self
	 */
	public static function create(
		string $namespace,
		string $slug,
		\Sellastica\CustomField\Model\CustomFieldType $type
	): self
	{
		return new self($namespace, $slug, $type);
	}
}