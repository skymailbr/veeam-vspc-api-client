<?php

namespace Shellrent\VeeamVspcApiClient\Payloads;

class OAuthPayload implements Payload {
	private string $Username;
	
	private string $Password;
	
	/**
	 * CreateTokenPayload constructor.
	 *
	 * @param string $Username
	 * @param string $Password
	 */
	public function __construct( string $Username, string $Password ) {
		$this->Username = $Username;
		$this->Password = $Password;
	}
	
	/**
	 * @param string $Username
	 *
	 * @return OAuthPayload
	 */
	public function setUsername( string $Username ): OAuthPayload {
		$this->Username = $Username;
		
		return $this;
	}
	
	/**
	 * @param string $Password
	 *
	 * @return OAuthPayload
	 */
	public function setPassword( string $Password ): OAuthPayload {
		$this->Password = $Password;
		
		return $this;
	}
	
	public function getBody() {
		return
			http_build_query( [
				'grant_type' => 'password',
				'username' => $this->Username,
				'password' => $this->Password,
				'refresh_token' => null,
				'mfa_token' => null,
				'mfa_code' => null,
				'code' => null,
				'public_key' => null,
				'userUid' => null
			] );
	}
	
	public function getContentType(): string {
		return 'application/x-www-form-urlencoded';
	}
}
