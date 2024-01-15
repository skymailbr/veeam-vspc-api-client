<?php

namespace Skymail\VeeamVspcApiClient\Repositories;

use Skymail\VeeamVspcApiClient\Support\CreateDeleteRequest;
use Skymail\VeeamVspcApiClient\Support\CreateGetRequest;
use Skymail\VeeamVspcApiClient\Support\RequestBuilder;

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

	public function getAllVeeamBackupAgentJobs(): RequestBuilder {
		return $this->createGetRequest( '/jobs' );
	}
}
