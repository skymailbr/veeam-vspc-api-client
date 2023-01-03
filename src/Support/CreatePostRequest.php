<?php

namespace Shellrent\VeeamVspcApiClient\Support;

use Shellrent\VeeamVspcApiClient\Payloads\Payload;

trait CreatePostRequest {
	protected function createPostRequest( string $url, ?Payload $payload = null, array $options = [] ) {
		$uri = $this->getBaseRoute() . $url;
		
		if( $payload and $payload->getContentType() ) {
			$options['Content-Type'] = $payload->getContentType();
		}
		
		return ( new RequestBuilder( 'POST', $uri, $options, $payload ? $payload->getBody() : null ) );
	}
}
