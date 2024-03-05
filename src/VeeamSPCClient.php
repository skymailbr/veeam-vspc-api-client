<?php

namespace Skymail\VeeamVspcApiClient;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Skymail\VeeamVspcApiClient\Support\Filter;
use Skymail\VeeamVspcApiClient\Support\FilterCollection;
use Skymail\VeeamVspcApiClient\Support\RequestBuilder;

class VeeamSPCClient {

	protected $Client;

	protected $Token = null;

	protected $Options;

	protected $Endpoint;

	public function __construct( string $Endpoint, string $Token, array $Options = [] ) {
		$this->Token = $Token;
		$this->Endpoint = $Endpoint;
		$this->Options = $Options;
		$this->Client = $this->getClient();
	}

	protected function getClient() {
		return new Client( [
			'base_uri' => $this->Endpoint . '/',
		] );
	}

	protected function getOptions(): array {
		$additions = [];

		$additions[ RequestOptions::ALLOW_REDIRECTS ] = true;

		if ( $this->Token ) {
			$additions[RequestOptions::HEADERS] = [
				'Authorization' => sprintf( 'Bearer %s', $this->Token ),
			];
		}

		return array_merge( $this->Options, $additions );
	}

	/**
	 * @param RequestBuilder $requestBuilder
	 * @param null|Filter|FilterCollection $filter
	 * @param array|null $queryParams
	 *
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 * @return \Psr\Http\Message\ResponseInterface
	 */
	public function send( RequestBuilder $requestBuilder, $filter = null, ?array $queryParams = null ) {
		if ( $filter ) {
			$requestBuilder->filter( $filter );
		}

		if ( $queryParams ) {
			$requestBuilder->query( $queryParams );
		}

		return $this->Client->send( $requestBuilder->buildRequest(), $this->getOptions() );
	}

	/**
	 * @param RequestBuilder $requestBuilder
	 * @param null|Filter|FilterCollection $filter
	 * @param array|null $queryParams
	 *
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 * @return mixed
	 */
	public function jsonResponse( RequestBuilder $requestBuilder, $filter = null, ?array $queryParams = null ) {
		if ( $filter ) {
			$requestBuilder->filter( $filter );
		}

		if ( $queryParams ) {
			$requestBuilder->query( $queryParams );
		}

		$res = $this->send( $requestBuilder, $filter, $queryParams );

		return json_decode( $res->getBody() );
	}
}
