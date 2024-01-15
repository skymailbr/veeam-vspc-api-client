<?php

namespace Skymail\VeeamVspcApiClient\Repositories;

use Skymail\VeeamVspcApiClient\Support\CreateGetRequest;
use Skymail\VeeamVspcApiClient\Support\RequestBuilder;

class ManagementAgentsRepository implements Repository {
	use CreateGetRequest;

	public function getBaseRoute(): string {
		return 'infrastructure/managementAgents';
	}


	public function downloadManagementAgentSetupFileForWindows(): RequestBuilder {
		return $this->createGetRequest( '/packages/windows' );
	}


	public function downloadManagementAgentSetupFileForLinux(): RequestBuilder {
		return $this->createGetRequest( '/packages/linux' );
	}


	public function downloadManagementAgentSetupFileForMacOS(): RequestBuilder {
		return $this->createGetRequest( '/packages/mac' );
	}
}
