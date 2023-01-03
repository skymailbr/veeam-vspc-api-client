<?php

namespace Shellrent\VeeamVspcApiClient\Support;

use JsonSerializable;

class Filter implements JsonSerializable {
	public const OPERATION_IN = 'in';

	public const OPERATION_CONTAINS = 'contains';

	public const OPERATION_SUBSET = 'subset';

	public const OPERATION_SUPERSET = 'superset';

	public const OPERATION_EQUALS = 'equals';

	public const OPERATION_NOT_EQUALS = 'notEquals';

	public const OPERATION_LESS_THAN = 'lessThan';

	public const OPERATION_LESS_THAN_OR_EQUAL = 'lessThanOrEqual';

	public const OPERATION_GREATER_THAN = 'greaterThan';

	public const OPERATION_GREATER_THAN_OR_EQUAL = 'greaterThanOrEqual';

	public const OPERATION_EXCLUSIVE_OR = 'exclusiveOr';

	public const OPERATION_OR = 'or';

	public const OPERATION_AND = 'and';

	public const OPERATION_NOT = 'not';
	
	private string $Property;

	private ?string $Items = null;

	private string $Operation;

	private ?string $Collation = null;

	private string $Value;
	
	/**
	 * Filter constructor.
	 *
	 * @param string $Property
	 * @param string $Operation
	 * @param string $Value
	 */
	public function __construct( string $Property, string $Operation, string $Value ) {
		$this->Property = $Property;
		$this->Operation = $Operation;
		$this->Value = $Value;
	}
	
	/**
	 * @param string $Property
	 *
	 * @return Filter
	 */
	public function setProperty( string $Property ): Filter {
		$this->Property = $Property;

		return $this;
	}
	
	/**
	 * @param string|null $Items
	 *
	 * @return Filter
	 */
	public function setItems( ?string $Items ): Filter {
		$this->Items = $Items;

		return $this;
	}
	
	/**
	 * @param string $Operation
	 *
	 * @return Filter
	 */
	public function setOperation( string $Operation ): Filter {
		$this->Operation = $Operation;

		return $this;
	}
	
	/**
	 * @param string|null $Collation
	 *
	 * @return Filter
	 */
	public function setCollation( ?string $Collation ): Filter {
		$this->Collation = $Collation;

		return $this;
	}
	
	/**
	 * @param string $Value
	 *
	 * @return Filter
	 */
	public function setValue( string $Value ): Filter {
		$this->Value = $Value;

		return $this;
	}
	
	public function jsonSerialize() {
		return [
			[
				'property' => $this->Property,
				'items' => $this->Items,
				'operation' => $this->Operation,
				'collation' => $this->Collation ?? 'ordinal',
				'value' => $this->Value,
			],
		];
	}
}
