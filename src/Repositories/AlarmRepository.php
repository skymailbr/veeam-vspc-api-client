<?php

namespace Skymail\VeeamVspcApiClient\Repositories;

use Skymail\VeeamVspcApiClient\Support\CreateGetRequest;
use Skymail\VeeamVspcApiClient\Support\CreatePostRequest;
use Skymail\VeeamVspcApiClient\Support\RequestBuilder;

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
