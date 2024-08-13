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

	public function getStorage(): RequestBuilder
	{
		return $this->createGetRequest('/companies/sites/backupResources/usage');
	}

	public function getAllLocations(): RequestBuilder
	{
		return $this->createGetRequest('/locations');
	}

	public function getCompanies($expandOrganization = false): RequestBuilder {
		if ($expandOrganization) {
			return $this->createGetRequest( '/companies?expand=Organization&' );
		}
		return $this->createGetRequest( '/companies' );
	}
}
