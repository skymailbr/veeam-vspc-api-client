<?php

namespace Skymail\VeeamVspcApiClient\Support;

trait CreateDeleteRequest {
	protected function createDeleteRequest( string $url ): RequestBuilder {
		$uri = $this->getBaseRoute() . $url;

		return (new RequestBuilder( 'DELETE', $uri ) );
	}
}
