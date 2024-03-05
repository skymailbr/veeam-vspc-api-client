<?php

namespace Skymail\VeeamVspcApiClient\Support;

class UrlBuilder {
	/**
	 * Check if the call to {@link parse_url} returned FALSE
	 */
	private $ParseError = false;

	/**
	 * @var string|null
	 */
	private $Protocol;

	/**
	 * @var string|null
	 */
	private $Host;

	/**
	 * @var string|null
	 */
	private $Port;

	/**
	 * @var string|null
	 */
	private $Username;

	/**
	 * @var string|null
	 */
	private $Password;

	/**
	 * @var string|null
	 */
	private $Path;

	/**
	 * @var array<string,string|array>
	 */
	private $QueryParams = [];

	/**
	 * @var string|null
	 */
	private $Anchor;

	private $AsPath = false;

	/**
	 * @param string $url
	 *
	 * @return static
	 */
	public static function createByUrl( string $url ): self {
		$builder = new static();

		if ( $url === '' ) {
			return $builder;
		}

		$protocol = parse_url( $url, PHP_URL_SCHEME );

		/** Aggiunta del protocollo se non presente perchè parse_url senza di esso non analizza nel modo corretto l'url */
		if ( empty( $protocol ) ) {
			$url = sprintf( 'https://%s', $url );
		}

		$parsedUrl = parse_url( $url );

		if ( !$parsedUrl ) {
			$builder->ParseError = true;

			return $builder;
		}

		if ( isset( $parsedUrl['scheme'] ) and trim( $parsedUrl['scheme'] ) !== '' ) {
			$builder->setProtocol( trim( $parsedUrl['scheme'] ) );
		}

		if ( isset( $parsedUrl['host'] ) and trim( $parsedUrl['host'] ) !== '' ) {
			$builder->setHost( trim( $parsedUrl['host'] ) );
		}

		if ( isset( $parsedUrl['port'] ) and trim( $parsedUrl['port'] ) !== '' ) {
			$builder->setPort( trim( $parsedUrl['port'] ) );
		}

		if ( isset( $parsedUrl['user'] ) and trim( $parsedUrl['user'] ) !== '' ) {
			$builder->setUsername( trim( $parsedUrl['user'] ) );
		}

		if ( isset( $parsedUrl['pass'] ) and trim( $parsedUrl['pass'] ) !== '' ) {
			$builder->setPassword( trim( $parsedUrl['pass'] ) );
		}

		if ( isset( $parsedUrl['path'] ) and trim( $parsedUrl['path'] ) !== '' ) {
			$builder->setPath( trim( $parsedUrl['path'] ) );
		}

		if ( isset( $parsedUrl['query'] ) and trim( $parsedUrl['query'] ) !== '' ) {
			$queryString = trim( $parsedUrl['query'] );

			parse_str( $queryString, $queryParams );

			foreach ( $queryParams as $paramKey => $paramValue ) {
				$builder->addQueryParam( $paramKey, $paramValue );
			}
		}

		if ( isset( $parsedUrl['fragment'] ) and trim( $parsedUrl['fragment'] ) !== '' ) {
			$builder->setAnchor( trim( $parsedUrl['fragment'] ) );
		}

		return $builder;
	}

	/**
	 * @return string
	 */
	public function build(): string {
		$url = '';

		if ( empty( $this->Protocol ) ) {
			$this->Protocol = 'https';
		}

		if ( !$this->AsPath ) {
			$url .= sprintf( '%s://', $this->Protocol );
		}

		if ( !empty( $this->Username ) and !empty( $this->Password ) ) {
			$url .= sprintf( '%s:%s@', $this->Username, $this->Password );
		}

		if ( !empty( $this->Host ) ) {
			$url .= $this->Host;
		}

		if ( !empty( $this->Port ) ) {
			$url .= sprintf( ':%s', $this->Port );
		}

		if ( !empty( $this->Path ) ) {
			$url .= $this->Path;
		}

		if ( count( $this->QueryParams ) > 0 ) {
			$queryString = http_build_query( $this->QueryParams );

			if ( !empty( $queryString ) ) {
				$url .= sprintf( '?%s', $queryString );
			}
		}

		if ( !empty( $this->Anchor ) ) {
			$url .= sprintf( '#%s', $this->Anchor );
		}

		return $url;
	}

	//<editor-fold defaultstate="collapsed" desc="Getters and Setters">

	/**
	 * @return string|null
	 */
	public function getProtocol(): ?string {
		return $this->Protocol;
	}

	/**
	 * @param string|null $Protocol
	 *
	 * @return $this
	 */
	public function setProtocol( ?string $Protocol ): self {
		if ( is_null( $Protocol ) or $Protocol === '' ) {
			$Protocol = null;

		} else {
			$Protocol = trim( $Protocol, ':// ' );
		}

		$this->Protocol = $Protocol;

		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getHost(): ?string {
		return $this->Host;
	}

	/**
	 * @param string|null $Host
	 *
	 * @return $this
	 */
	public function setHost( ?string $Host ): self {
		$this->Host = $Host;

		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getPort(): ?string {
		return $this->Port;
	}

	/**
	 * @param string|null $Port
	 *
	 * @return $this
	 */
	public function setPort( ?string $Port ): self {
		if ( is_null( $Port ) or $Port === '' ) {
			$Port = null;

		} else {
			$Port = trim( $Port, ': ' );
		}

		$this->Port = $Port;

		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getUsername(): ?string {
		return $this->Username;
	}

	/**
	 * @param string|null $Username
	 *
	 * @return $this
	 */
	public function setUsername( ?string $Username ): self {
		$this->Username = $Username;

		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getPassword(): ?string {
		return $this->Password;
	}

	/**
	 * @param string|null $Password
	 *
	 * @return $this
	 */
	public function setPassword( ?string $Password ): self {
		$this->Password = $Password;

		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getPath(): ?string {
		return $this->Path;
	}

	/**
	 * @param string|null $Path
	 *
	 * @return $this
	 */
	public function setPath( ?string $Path ): self {
		if ( is_null( $Path ) or $Path === '' ) {
			$Path = null;
		}

		$this->Path = $Path;

		return $this;
	}

	/**
	 * Appends to the existing path
	 *
	 * @param string $path
	 *
	 * @return $this
	 */
	public function appendPath( string $path ): self {
		if ( is_null( $this->Path ) ) {
			$this->Path = $path;

		} else {
			$this->Path .= $path;
		}

		return $this;
	}

	/**
	 * @return array
	 */
	public function getQueryParams(): array {
		return $this->QueryParams;
	}

	/**
	 * @param array $QueryParams
	 *
	 * @return $this
	 */
	public function setQueryParams( array $QueryParams ): self {
		$this->QueryParams = $QueryParams;

		return $this;
	}

	/**
	 * @param string $paramkey
	 * @param string|array $paramValue
	 *
	 * @return $this
	 */
	public function addQueryParam( string $paramkey, $paramValue ): self {
		$this->QueryParams[$paramkey] = $paramValue;

		return $this;
	}

	/**
	 * @param string $paramkey
	 *
	 * @return $this
	 */
	public function removeQueryParam( string $paramkey ): self {
		unset( $this->QueryParams[$paramkey] );

		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getAnchor(): ?string {
		return $this->Anchor;
	}

	/**
	 * @param string|null $Anchor
	 *
	 * @return $this
	 */
	public function setAnchor( ?string $Anchor ): self {
		if ( is_null( $Anchor ) or $Anchor === '' ) {
			$Anchor = null;

		} else {
			$Anchor = trim( $Anchor, '# ' );
		}

		$this->Anchor = $Anchor;

		return $this;
	}

	/**
	 * @return bool
	 */
	public function isParseError(): bool {
		return $this->ParseError;
	}

	public function asPath(): self {
		$this->AsPath = true;

		return $this;
	}

	//</editor-fold>
}
