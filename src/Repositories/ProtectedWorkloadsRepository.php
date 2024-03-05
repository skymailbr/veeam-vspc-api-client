<?php

namespace Skymail\VeeamVspcApiClient\Repositories;

use Skymail\VeeamVspcApiClient\Support\CreateDeleteRequest;
use Skymail\VeeamVspcApiClient\Support\CreateGetRequest;
use Skymail\VeeamVspcApiClient\Support\RequestBuilder;

class ProtectedWorkloadsRepository implements Repository
{
	use CreateGetRequest;

	use CreateDeleteRequest;

	public function getBaseRoute(): string
	{
		return 'protectedWorkloads';
	}

	public function getAll(): RequestBuilder
	{
		return $this->createGetRequest('');
	}

	public function getAllComputersManagedByConsole(): RequestBuilder
	{
		return $this->createGetRequest('/computersManagedByConsole');
	}
}
