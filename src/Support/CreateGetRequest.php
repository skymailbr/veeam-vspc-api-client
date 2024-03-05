<?php

namespace Skymail\VeeamVspcApiClient\Support;

trait CreateGetRequest {
	protected function createGetRequest( string $url ): RequestBuilder {
		$uri = $this->getBaseRoute() . $url;

		return (new RequestBuilder( 'GET', $uri ) );
	}
}
