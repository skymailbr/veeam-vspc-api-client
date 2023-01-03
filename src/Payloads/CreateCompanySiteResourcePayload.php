<?php

namespace Shellrent\VeeamVspcApiClient\Payloads;

class CreateCompanySiteResourcePayload implements Payload {
	private string $SiteUid;
	
	private string $CompanyUid;
	
	private string $Username;
	
	private string $Password;
	
	private string $GatewayPool;
	
	/**
	 * @param string $SiteUid
	 *
	 * @return CreateCompanySiteResourcePayload
	 */
	public function setSiteUid( string $SiteUid ): CreateCompanySiteResourcePayload {
		$this->SiteUid = $SiteUid;

		return $this;
	}
	
	/**
	 * @param string $CompanyUid
	 *
	 * @return CreateCompanySiteResourcePayload
	 */
	public function setCompanyUid( string $CompanyUid ): CreateCompanySiteResourcePayload {
		$this->CompanyUid = $CompanyUid;

		return $this;
	}
	
	/**
	 * @param string $Username
	 *
	 * @return CreateCompanySiteResourcePayload
	 */
	public function setUsername( string $Username ): CreateCompanySiteResourcePayload {
		$this->Username = $Username;

		return $this;
	}
	
	/**
	 * @param string $Password
	 *
	 * @return CreateCompanySiteResourcePayload
	 */
	public function setPassword( string $Password ): CreateCompanySiteResourcePayload {
		$this->Password = $Password;

		return $this;
	}
	
	/**
	 * @param string $GatewayPool
	 *
	 * @return CreateCompanySiteResourcePayload
	 */
	public function setGatewayPool( string $GatewayPool ): CreateCompanySiteResourcePayload {
		$this->GatewayPool = $GatewayPool;

		return $this;
	}
	
	public function getBody() {
		$body = [
			'siteUid' => $this->SiteUid,
			'cloudTenantType' => 'General',
			'companyUid' => $this->CompanyUid,
			'vCloudOrganizationUid' => null,
			'ownerCredentials' => [
				'userName' => $this->Username,
				'password' => $this->Password,
			],
			'description' => '',
			'throttlingEnabled' => false,
			'throttlingValue' => 1,
			'throttlingUnit' => 'MbitPerSec',
			'maxConcurrentTask' => 1,
			'backupProtectionEnabled' => true,
			'backupProtectionPeriodDays' => 1,
			'gatewaySelectionType' => 'GatewayPool',
			'gatewayPoolsUids' => [$this->GatewayPool],
			'isGatewayFailoverEnabled' => false,
		];
		
		return json_encode( $body );
	}
	
	public function getContentType(): string {
		return 'application/json';
	}
}
