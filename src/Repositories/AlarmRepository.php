<?php

namespace Shellrent\VeeamVspcApiClient\Repositories;

use Shellrent\VeeamVspcApiClient\Support\CreateGetRequest;
use Shellrent\VeeamVspcApiClient\Support\CreatePostRequest;
use Shellrent\VeeamVspcApiClient\Support\RequestBuilder;

class AlarmRepository implements Repository {
	use CreateGetRequest;

	use CreatePostRequest;
	
	public function getBaseRoute(): string {
		return 'alarms';
	}
	
	public function getAllTriggeredAlarms(): RequestBuilder {
		return $this->createGetRequest( '/active' );
	}
	
	public function getAllAlarmTemplates(): RequestBuilder {
		return $this->createGetRequest( '/templates' );
	}
	
	public function postResolveAlarm( string $alarmUid, string $comment = ' ' ): RequestBuilder {
		return $this->createPostRequest( sprintf( '/active/%s/resolve', $alarmUid ) )
			->query( [
				'comment' => $comment,
				'resolveOnClients' => 'true',
			] );
	}
	
	public function getAlarmStatusChanges( string $alarmUid ): RequestBuilder {
		return $this->createGetRequest( sprintf( '/templates/%s/events', $alarmUid ) );
	}
}
