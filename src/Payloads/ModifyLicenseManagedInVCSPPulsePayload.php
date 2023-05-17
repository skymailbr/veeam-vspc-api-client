<?php

namespace Shellrent\VeeamVspcApiClient\Payloads;

class ModifyLicenseManagedInVCSPPulsePayload implements Payload {
	protected string $AssignedCompanyUid;
	
	protected array $Modifiers;
	
	public function getBody() {
		$body = $this->Modifiers;
		
		return json_encode( $body );
	}
	
	public function assignedCompanyUid( string $companyUid ) {
		$this->Modifiers[] = [
			'value' => $companyUid,
			'path' => '/assignedCompanyUid',
			'op' => 'replace'
		];
		
		return $this;
	}
	
	public function expirationDate( string $isoDate ): ModifyLicenseManagedInVCSPPulsePayload {
		$this->Modifiers[] = [
			'value' => $isoDate,
			'path' => '/expirationDate',
			'op' => 'replace'
		];
		
		return $this;
	}
	
	public function getContentType(): string {
		return 'application/json';
	}
}
