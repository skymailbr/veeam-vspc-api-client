<?php

namespace Skymail\VeeamVspcApiClient\Repositories;

use Skymail\VeeamVspcApiClient\Support\CreateGetRequest;
use Skymail\VeeamVspcApiClient\Support\RequestBuilder;

class Microsoft365ServerRepository implements Repository {
	use CreateGetRequest;

	public function getBaseRoute(): string {
		return 'infrastructure/vb365Servers';
	}

	public function getAll(): RequestBuilder {
		return $this->createGetRequest( '' );
	}
}
