<?php

namespace Skymail\VeeamVspcApiClient\Repositories;

use Skymail\VeeamVspcApiClient\Support\CreateGetRequest;
use Skymail\VeeamVspcApiClient\Support\RequestBuilder;

class ResellerRepository implements Repository {
	use CreateGetRequest;

	public function getBaseRoute(): string {
		return 'organizations/resellers';
	}

	public function getAll($expandOrganization = false): RequestBuilder {
		if ($expandOrganization) {
			return $this->createGetRequest( '?expand=Organization&' );
		}
		return $this->createGetRequest( '' );

	}

	public function getCompaniesByResellerUid( string $resellerUid): RequestBuilder {
		return $this->createGetRequest( '/' . $resellerUid . '/companies' );
	}
}
