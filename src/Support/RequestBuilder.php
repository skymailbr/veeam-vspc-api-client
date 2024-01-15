<?php

namespace Skymail\VeeamVspcApiClient\Support;

use GuzzleHttp\Psr7\Request;


class RequestBuilder {
	private $Method;

	private $Uri;

	private $Headers;

	private $Body;

	private $Version;

	private $UriModifiers = [];

	/**
	 * Request constructor.
	 *
	 * @param string $Method
	 * @param string $Uri
	 * @param array $Headers
	 * @param null $Body
	 * @param string $Version
	 */
	public function __construct( string $Method, string $Uri, array $Headers = [], $Body = null, string $Version = '1.1' ) {
		$this->Method = $Method;
		$this->Uri = $Uri;
		$this->Headers = $Headers;
		$this->Body = $Body;
		$this->Version = $Version;
	}

	private function registerPostModifiers() {
		$this->UriModifiers[] = function($uri) {
			return trim($uri, '/');
		};
	}

	public function query( array $query ) {
		$this->UriModifiers[] = function ( $uri ) use ( $query ) {
			$urlBuilder = UrlBuilder::createByUrl( $uri );

			foreach ( $query as $key => $value ) {
				$urlBuilder->addQueryParam( $key, $value );
			}

			return $urlBuilder
				->asPath()
				->build();
		};

		return $this;
	}

	/**
	 * @param Filter|FilterCollection $filter
	 *
	 * @return $this
	 */
	public function filter( $filter ): self {
		$json = json_encode( $filter );

		$this->UriModifiers[] = function ( $uri ) use ( $json ) {
			$urlBuilder = UrlBuilder::createByUrl( $uri );

			$urlBuilder->addQueryParam( 'filter', $json );

			return $urlBuilder
				->asPath()
				->build();
		};

		return $this;
	}

	public function buildRequest() {
		$this->registerPostModifiers();

		foreach ( $this->UriModifiers as $modifier ) {
			$this->Uri = $modifier( $this->Uri );
		}

		return new Request( $this->Method, $this->Uri, $this->Headers, $this->Body, $this->Version );
	}
}
