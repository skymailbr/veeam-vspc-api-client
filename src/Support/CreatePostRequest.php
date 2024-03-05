<?php

namespace Skymail\VeeamVspcApiClient\Support;

use Skymail\VeeamVspcApiClient\Repositories\Payload;

trait CreatePostRequest {
	protected function createPostRequest( string $url, ?Payload $payload = null, array $options = [] ) {
		$uri = $this->getBaseRoute() . $url;

		if( $payload and $payload->getContentType() ) {
			$options['Content-Type'] = $payload->getContentType();
		}

		return ( new RequestBuilder( 'POST', $uri, $options, $payload ? $payload->getBody() : null ) );
	}
}
