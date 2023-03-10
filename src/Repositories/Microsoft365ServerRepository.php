<?php

namespace Shellrent\VeeamVspcApiClient\Repositories;

use Shellrent\VeeamVspcApiClient\Support\CreateGetRequest;
use Shellrent\VeeamVspcApiClient\Support\RequestBuilder;

class Microsoft365ServerRepository implements Repository {
	use CreateGetRequest;
	
	public function getBaseRoute(): string {
		return 'infrastructure/vb365Servers';
	}
	
	public function getAll(): RequestBuilder {
		return $this->createGetRequest( '' );
	}
}
