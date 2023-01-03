<?php

namespace Shellrent\VeeamVspcApiClient;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Shellrent\VeeamVspcApiClient\Support\Filter;
use Shellrent\VeeamVspcApiClient\Support\RequestBuilder;

class VeeamSPCClient {
	protected Client $Client;
	
	/**
	 * @var string
	 */
	protected ?string $Token = null;
	
	protected array $Options;
	
	protected string $Endpoint;
	
	/**
	 * VeeamServiceProviderConsoleClient constructor.
	 */
	public function __construct( string $Endpoint, ?string $Token = null, array $Options = [] ) {
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
	
	public function send( RequestBuilder $requestBuilder, ?Filter $filter = null, ?array $queryParams = null ) {
		if ( $filter ) {
			$requestBuilder->filter( $filter );
		}
		
		if ( $queryParams ) {
			$requestBuilder->query( $queryParams );
		}
		
		return $this->Client->send( $requestBuilder->buildRequest(), $this->getOptions() );
	}
	
	public function jsonResponse( RequestBuilder $requestBuilder, ?Filter $filter = null, ?array $queryParams = null ) {
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
