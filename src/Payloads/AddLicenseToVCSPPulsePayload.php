<?php

namespace Shellrent\VeeamVspcApiClient\Payloads;

use Carbon\Carbon;

class AddLicenseToVCSPPulsePayload implements Payload {
	protected string $ProductId;

	protected string $ContractId;

	protected ?string $Description = null;

	protected ?Carbon $ExpirationDate;

	protected string $Type = 'Rental';

	protected bool $IsAutomaticExtensionEnabled = true;

	protected array $Workloads = [];
	
	public function getBody() {
		$body = [
			'productId' => $this->ProductId,
			'contractId' => $this->ContractId,
			'description' => $this->Description,
			'expirationDate' => $this->ExpirationDate->toIso8601String(),
			'type' => $this->Type,
			'isAutomaticExtensionEnabled' => $this->IsAutomaticExtensionEnabled,
			'workloads' => $this->Workloads,
		];
		
		return json_encode( $body );
	}
	
	/**
	 * @param string $ProductId
	 *
	 * @return AddLicenseToVCSPPulsePayload
	 */
	public function setProductId( string $ProductId ): AddLicenseToVCSPPulsePayload {
		$this->ProductId = $ProductId;

		return $this;
	}
	
	/**
	 * @param string $ContractId
	 *
	 * @return AddLicenseToVCSPPulsePayload
	 */
	public function setContractId( string $ContractId ): AddLicenseToVCSPPulsePayload {
		$this->ContractId = $ContractId;

		return $this;
	}
	
	/**
	 * @param string|null $Description
	 *
	 * @return AddLicenseToVCSPPulsePayload
	 */
	public function setDescription( ?string $Description ): AddLicenseToVCSPPulsePayload {
		$this->Description = $Description;

		return $this;
	}
	
	/**
	 * @param Carbon|null $ExpirationDate
	 *
	 * @return AddLicenseToVCSPPulsePayload
	 */
	public function setExpirationDate( ?Carbon $ExpirationDate ): AddLicenseToVCSPPulsePayload {
		$this->ExpirationDate = $ExpirationDate;

		return $this;
	}
	
	/**
	 * @param string $Type
	 *
	 * @return AddLicenseToVCSPPulsePayload
	 */
	public function setType( string $Type ): AddLicenseToVCSPPulsePayload {
		$this->Type = $Type;

		return $this;
	}
	
	/**
	 * @param bool $IsAutomaticExtensionEnabled
	 *
	 * @return AddLicenseToVCSPPulsePayload
	 */
	public function setIsAutomaticExtensionEnabled( bool $IsAutomaticExtensionEnabled ): AddLicenseToVCSPPulsePayload {
		$this->IsAutomaticExtensionEnabled = $IsAutomaticExtensionEnabled;

		return $this;
	}
	
	public function addWorkload( $workloadId, $count ) {
		$this->Workloads[] = [
			'workloadId' => $workloadId,
			'count' => $count,
		];
		
		return $this;
	}
	
	public function getContentType(): string {
		return 'application/json';
	}
}
