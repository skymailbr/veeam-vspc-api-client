<?php

namespace Skymail\VeeamVspcApiClient\Repositories;

use Skymail\VeeamVspcApiClient\Support\CreateGetRequest;
use Skymail\VeeamVspcApiClient\Support\RequestBuilder;

class MiscRepository implements Repository {
	use CreateGetRequest;

	public function getBaseRoute(): string {
		return 'misc';
	}

	public function getAllCountries(): RequestBuilder {
		return $this->createGetRequest( '/countries' );
	}
}
