<?php
namespace Sellastica\CustomField\Model;

class CustomFieldDisplayType
{
	const ONE_LINE_TEXT = 'one_line_text',
		MULTI_LINE_TEXT = 'multi_line_text',
		HTML = 'html',
		CHECKBOX = 'checkbox',
		SELECTION = 'selection',
		NUMBER = 'number',
		JSON = 'json';

	/** @var array */
	private static $types = [
		self::ONE_LINE_TEXT => 'core.custom_fields.display_types.one_line_text',
		self::MULTI_LINE_TEXT => 'core.custom_fields.display_types.multi_line_text',
		self::HTML => 'core.custom_fields.display_types.html',
		self::CHECKBOX => 'core.custom_fields.display_types.checkbox',
		self::SELECTION => 'core.custom_fields.display_types.selection',
		self::NUMBER => 'core.custom_fields.display_types.number',
		self::JSON => 'core.custom_fields.display_types.json',
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
	 * @return CustomFieldType
	 */
	public function toStandardCustomFieldType(): \Sellastica\CustomField\Model\CustomFieldType
	{
		switch ($this->type) {
			case self::CHECKBOX:
				return CustomFieldType::bool();
				break;
			case self::NUMBER:
				return CustomFieldType::int();
				break;
			case self::JSON:
				return \Sellastica\CustomField\Model\CustomFieldType::json();
				break;
			default:
				return \Sellastica\CustomField\Model\CustomFieldType::string();
				break;
		}
	}

	/**
	 * @return bool
	 */
	public function isJson(): bool
	{
		return $this->type === self::JSON;
	}

	/**
	 * @return bool
	 */
	public function isSelection(): bool
	{
		return $this->type === self::SELECTION;
	}

	/**
	 * @param string $type
	 * @return CustomFieldDisplayType
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
	 * @return array
	 */
	public static function getTypes(): array
	{
		return self::$types;
	}
}