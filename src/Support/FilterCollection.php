<?php

namespace Skymail\VeeamVspcApiClient\Support;

class FilterCollection implements \JsonSerializable {
	/**
	 * @var Filter
	 */
	private $Filters = [];

	public function add( Filter $filter ) {
		$this->Filters[] = $filter->toArray();
	}

	public function jsonSerialize(): mixed {
		return $this->Filters;
	}
}