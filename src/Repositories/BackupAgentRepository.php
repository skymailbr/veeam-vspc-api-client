<?php

namespace Shellrent\VeeamVspcApiClient\Repositories;

use Shellrent\VeeamVspcApiClient\Support\CreateDeleteRequest;
use Shellrent\VeeamVspcApiClient\Support\CreateGetRequest;
use Shellrent\VeeamVspcApiClient\Support\RequestBuilder;

class BackupAgentRepository implements Repository {
	use CreateGetRequest;

	use CreateDeleteRequest;
	
	public function getBaseRoute(): string {
		return 'infrastructure/backupAgents';
	}
	
	public function getAll(): RequestBuilder {
		return $this->createGetRequest( '' );
	}
	
	public function delete( string $backupAgentUid ) {
		return $this->createDeleteRequest( '/' . $backupAgentUid );
	}
}
