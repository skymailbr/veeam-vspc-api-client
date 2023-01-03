<?php

namespace Shellrent\VeeamVspcApiClient\Repositories;

use Shellrent\VeeamVspcApiClient\Support\CreateGetRequest;
use Shellrent\VeeamVspcApiClient\Support\RequestBuilder;

class CloudConnectRepository implements Repository {
	use CreateGetRequest;
	
	public function getBaseRoute(): string {
		return 'infrastructure/sites';
	}
	
	public function getAllSites(): RequestBuilder {
		return $this->createGetRequest( '' );
	}
	
	public function getAllCloudGatewayPools(): RequestBuilder {
		return $this->createGetRequest( '/cloudgatewaypools' );
	}
}
