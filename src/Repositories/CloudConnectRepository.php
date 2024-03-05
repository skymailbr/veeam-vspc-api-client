<?php

namespace Skymail\VeeamVspcApiClient\Repositories;

use Skymail\VeeamVspcApiClient\Support\CreateGetRequest;
use Skymail\VeeamVspcApiClient\Support\RequestBuilder;

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
