<?php
namespace Sellastica\CustomField\Model;

use Nette\Utils\Json;
use Nette\Utils\JsonException;

class CustomFieldType
{
	const INT = 'int',
		BOOL = 'bool',
		STRING = 'string',
		JSON = 'json';

	/** @var array */
	private static $types = [
		self::INT,
		self::BOOL,
		self::STRING,
		self::JSON,
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
	 * @return bool
	 */
	public function isInt(): bool
	{
		return $this->type === self::INT;
	}

	/**
	 * @return bool
	 */
	public function isJson(): bool
	{
		return $this->type === self::JSON;
	}

	/**
	 * Returns retyped $value based on own type
	 *
	 * @param $value
	 * @return int|string
	 */
	public function retype($value)
	{
		switch ($this->type) {
			case self::INT:
				return (int)$value;
				break;
			case self::BOOL:
				return (bool)$value;
				break;
			default:
				return (string)$value;
			break;
		}
	}

	/**
	 * @return string
	 */
	public function __toString(): string
	{
		return $this->type;
	}

	/**
	 * @param string $type
	 * @return CustomFieldType
	 * @throws \InvalidArgumentException
	 */
	public static function from(string $type): self
	{
		if (!in_array($type, self::$types)) {
			throw new \InvalidArgumentException(sprintf('Invalid custom field type "%s"', $type));
		}

		return new self($type);
	}

	/**
	 * @return self
	 */
	public static function int(): self
	{
		return new self(self::INT);
	}

	/**
	 * @return self
	 */
	public static function bool(): self
	{
		return new self(self::BOOL);
	}

	/**
	 * @return self
	 */
	public static function string(): self
	{
		return new self(self::STRING);
	}

	/**
	 * @return self
	 */
	public static function json(): self
	{
		return new self(self::JSON);
	}

	/**
	 * @param $value
	 * @return CustomFieldType
	 * @throws \InvalidArgumentException
	 */
	public static function byValue($value): CustomFieldType
	{
		if (is_string($value) || is_null($value)) {
			return self::string();
		} elseif (is_bool($value)) {
			return self::bool();
		} elseif (is_int($value)) {
			return self::int();
		}

		throw new \InvalidArgumentException(sprintf('Invalid custom field type'));
	}

	/**
	 * @param $value
	 * @param CustomFieldType $type
	 * @return int|mixed|null|string
	 * @throws JsonException If type is JSON and value is not valid
	 */
	public static function resolve($value, CustomFieldType $type)
	{
		if ($value === null) {
			return null;
		}

		switch ($type->getType()) {
			case self::BOOL:
				return (bool)$value;
				break;
			case self::INT:
				return (int)$value;
				break;
			case self::JSON:
				return Json::decode($value, Json::FORCE_ARRAY);
				break;
			default:
				return (string)$value;
				break;
		}
	}
}