<?php

namespace Shellrent\VeeamVspcApiClient\Repositories;

use Shellrent\VeeamVspcApiClient\Support\CreateGetRequest;
use Shellrent\VeeamVspcApiClient\Support\RequestBuilder;

class MiscRepository implements Repository {
	use CreateGetRequest;
	
	public function getBaseRoute(): string {
		return 'misc';
	}
	
	public function getAllCountries(): RequestBuilder {
		return $this->createGetRequest( '/countries' );
	}
}
