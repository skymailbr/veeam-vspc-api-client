<?php

namespace Skymail\VeeamVspcApiClient\Support;

use Skymail\VeeamVspcApiClient\Repositories\Payload;

trait CreatePatchRequest {
	protected function createPatchRequest( string $url, ?Payload $payload = null, array $options = [] ): RequestBuilder {
		$uri = $this->getBaseRoute() . $url;

		if ( $payload->getContentType() ) {
			$options['Content-Type'] = $payload->getContentType();
		}

		return ( new RequestBuilder( 'PATCH', $uri, $options, $payload ? $payload->getBody() : null ) );
	}
}
