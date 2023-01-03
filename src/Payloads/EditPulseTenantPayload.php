<?php

namespace Shellrent\VeeamVspcApiClient\Payloads;

class EditPulseTenantPayload implements Payload {
	private string $MappedMasterOrganizationUid;
	
	public function getBody() {
		$body = [
			[
				'value' => $this->MappedMasterOrganizationUid,
				'path' => '/mappedMasterOrganizationUid',
				'op' => 'replace'
			]
		];
		
		return json_encode( $body );
	}
	
	public function getContentType(): string {
		return 'application/json';
	}
	
	/**
	 * @param string $MappedMasterOrganizationUid
	 *
	 * @return EditPulseTenantPayload
	 */
	public function setMappedMasterOrganizationUid( string $MappedMasterOrganizationUid ): EditPulseTenantPayload {
		$this->MappedMasterOrganizationUid = $MappedMasterOrganizationUid;

		return $this;
	}
}
