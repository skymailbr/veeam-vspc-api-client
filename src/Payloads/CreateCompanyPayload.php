<?php

namespace Shellrent\VeeamVspcApiClient\Payloads;

class CreateCompanyPayload implements Payload {
	private string $Name;
	
	private ?string $Alias;
	
	private string $TaxId;
	
	private string $Email;
	
	private string $Phone;
	
	private int $Country;
	
	private string $City;
	
	private string $Street;
	
	private int $ZipCode;
	
	private int $CompanyId;
	
	private ?string $ResellerUid = null;
	
	private ?string $SubscriptionPlanUid = null;
	
	private array $Permissions = [
		'REST',
	];

	private bool $IsAlarmDetectEnabled = true;
	
	/**
	 * @param mixed $Name
	 *
	 * @return CreateCompanyPayload
	 */
	public function setName( $Name ) {
		$this->Name = $Name;

		return $this;
	}
	
	/**
	 * @param mixed $Alias
	 *
	 * @return CreateCompanyPayload
	 */
	public function setAlias( $Alias ) {
		$this->Alias = $Alias;

		return $this;
	}
	
	/**
	 * @param mixed $TaxId
	 *
	 * @return CreateCompanyPayload
	 */
	public function setTaxId( $TaxId ) {
		$this->TaxId = $TaxId;

		return $this;
	}
	
	/**
	 * @param mixed $Email
	 *
	 * @return CreateCompanyPayload
	 */
	public function setEmail( $Email ) {
		$this->Email = $Email;

		return $this;
	}
	
	/**
	 * @param mixed $Phone
	 *
	 * @return CreateCompanyPayload
	 */
	public function setPhone( $Phone ) {
		$this->Phone = $Phone;

		return $this;
	}
	
	/**
	 * @param mixed $Country
	 *
	 * @return CreateCompanyPayload
	 */
	public function setCountry( $Country ) {
		$this->Country = $Country;

		return $this;
	}
	
	/**
	 * @param mixed $City
	 *
	 * @return CreateCompanyPayload
	 */
	public function setCity( $City ) {
		$this->City = $City;

		return $this;
	}
	
	/**
	 * @param mixed $Street
	 *
	 * @return CreateCompanyPayload
	 */
	public function setStreet( $Street ) {
		$this->Street = $Street;

		return $this;
	}
	
	/**
	 * @param mixed $ZipCode
	 *
	 * @return CreateCompanyPayload
	 */
	public function setZipCode( $ZipCode ) {
		$this->ZipCode = $ZipCode;

		return $this;
	}
	
	/**
	 * @param mixed $CompanyId
	 *
	 * @return CreateCompanyPayload
	 */
	public function setCompanyId( $CompanyId ) {
		$this->CompanyId = $CompanyId;

		return $this;
	}
	
	/**
	 * @param string|null $ResellerUid
	 *
	 * @return CreateCompanyPayload
	 */
	public function setResellerUid( ?string $ResellerUid ): CreateCompanyPayload {
		$this->ResellerUid = $ResellerUid;

		return $this;
	}
	
	/**
	 * @param string|null $SubscriptionPlanUid
	 *
	 * @return CreateCompanyPayload
	 */
	public function setSubscriptionPlanUid( ?string $SubscriptionPlanUid ): CreateCompanyPayload {
		$this->SubscriptionPlanUid = $SubscriptionPlanUid;

		return $this;
	}
	
	/**
	 * @param array|string[] $Permissions
	 *
	 * @return CreateCompanyPayload
	 */
	public function setPermissions( $Permissions ) {
		$this->Permissions = $Permissions;

		return $this;
	}
	
	/**
	 * @param bool $IsAlarmDetectEnabled
	 *
	 * @return CreateCompanyPayload
	 */
	public function setIsAlarmDetectEnabled( bool $IsAlarmDetectEnabled ): CreateCompanyPayload {
		$this->IsAlarmDetectEnabled = $IsAlarmDetectEnabled;

		return $this;
	}
	
	public function getBody() {
		$array = [
			'resellerUid' => $this->ResellerUid,
			'organizationInput' => [
				'name' => $this->Name,
				'alias' => $this->Alias,
				'taxId' => $this->TaxId,
				'email' => $this->Email,
				'phone' => $this->Phone,
				'country' => $this->Country,
				'city' => $this->City,
				'street' => $this->Street,
				'zipCode' => $this->ZipCode,
				'companyId' => $this->CompanyId,
			],
			'subscriptionPlanUid' => $this->SubscriptionPlanUid,
			'permissions' => $this->Permissions,
			'IsAlarmDetectEnabled' => $this->IsAlarmDetectEnabled,
		];
		
		return json_encode( $array );
	}
	
	public function getContentType(): string {
		return 'application/json';
	}
}
