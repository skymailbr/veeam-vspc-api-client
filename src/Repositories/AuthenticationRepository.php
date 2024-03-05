<?php

namespace Skymail\VeeamVspcApiClient\Repositories;

use Skymail\VeeamVspcApiClient\OAuthPayload;
use Skymail\VeeamVspcApiClient\Support\CreatePostRequest;
use Skymail\VeeamVspcApiClient\Support\RequestBuilder;

class AuthenticationRepository implements Repository {
	use CreatePostRequest;

	public function getBaseRoute(): string {
		return '';
	}

	public function postOAuthAuthentication( OAuthPayload $payload ): RequestBuilder {
		return $this->createPostRequest( '/token', $payload );
	}
}
