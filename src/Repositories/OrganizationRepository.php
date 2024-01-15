<?php

namespace Skymail\VeeamVspcApiClient\Repositories;

use Skymail\VeeamVspcApiClient\Support\CreateGetRequest;
use Skymail\VeeamVspcApiClient\Support\RequestBuilder;

class OrganizationRepository implements Repository {
	use CreateGetRequest;

	public function getBaseRoute(): string {
		return 'organizations';
	}

	public function get(): RequestBuilder {
		return $this->createGetRequest( '' );
	}

}
