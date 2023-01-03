<?php

namespace Shellrent\VeeamVspcApiClient\Repositories;

use Shellrent\VeeamVspcApiClient\Payloads\OAuthPayload;
use Shellrent\VeeamVspcApiClient\Support\CreatePostRequest;
use Shellrent\VeeamVspcApiClient\Support\RequestBuilder;

class AuthenticationRepository implements Repository {
	use CreatePostRequest;
	
	public function getBaseRoute(): string {
		return '';
	}
	
	public function postOAuthAuthentication( OAuthPayload $payload ): RequestBuilder {
		return $this->createPostRequest( '/token', $payload );
	}
}
