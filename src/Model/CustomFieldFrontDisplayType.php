<?php
namespace Sellastica\CustomField\Model;

class CustomFieldFrontDisplayType
{
	const NONE = 'none',
		CHECKBOX = 'checkbox',
		RANGE = 'range';

	/** @var array */
	private static $types = [
		self::NONE => 'core.custom_fields.display_types.none',
		self::CHECKBOX => 'core.custom_fields.display_types.checkbox',
		self::RANGE => 'core.custom_fields.display_types.range',
	];
	/** @var string */
	private $type;


	/**
	 * @param string $type
	 */
	private function __construct(string $type)
	{
		$this->type = $type;
	}

	/**
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return self::$types[$this->type];
	}

	/**
	 * @return string
	 */
	public function __toString(): string
	{
		return $this->getTitle();
	}

	/**
	 * @param string $type
	 * @return CustomFieldFrontDisplayType
	 * @throws \InvalidArgumentException
	 */
	public static function from(string $type): self
	{
		if (!array_key_exists($type, self::$types)) {
			throw new \InvalidArgumentException("Invalid type $type");
		}

		return new self($type);
	}

	/**
	 * @return \Sellastica\CustomField\Model\CustomFieldFrontDisplayType
	 */
	public static function checkbox(): self
	{
		return new self(self::CHECKBOX);
	}

	/**
	 * @return array
	 */
	public static function getTypes(): array
	{
		return self::$types;
	}
}