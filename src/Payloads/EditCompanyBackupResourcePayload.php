<?php

namespace Shellrent\VeeamVspcApiClient\Payloads;

class EditCompanyBackupResourcePayload implements Payload {
	private ?int $ServerQuota = null;
	
	private ?int $WorkstationQuota = null;
	
	private ?int $VmQuota = null;
	
	private ?int $StorageQuota = null;
	
	/**
	 * @param int $ServerQuota
	 *
	 * @return EditCompanyBackupResourcePayload
	 */
	public function setServerQuota( int $ServerQuota ): EditCompanyBackupResourcePayload {
		$this->ServerQuota = $ServerQuota;
		
		return $this;
	}
	
	/**
	 * @param int $WorkstationQuota
	 *
	 * @return EditCompanyBackupResourcePayload
	 */
	public function setWorkstationQuota( int $WorkstationQuota ): EditCompanyBackupResourcePayload {
		$this->WorkstationQuota = $WorkstationQuota;
		
		return $this;
	}
	
	/**
	 * @param int $VmQuota
	 *
	 * @return EditCompanyBackupResourcePayload
	 */
	public function setVmQuota( int $VmQuota ): EditCompanyBackupResourcePayload {
		$this->VmQuota = $VmQuota;
		
		return $this;
	}
	
	/**
	 * @param int $StorageQuota
	 *
	 * @return EditCompanyBackupResourcePayload
	 */
	public function setStorageQuota( int $StorageQuota ): EditCompanyBackupResourcePayload {
		$this->StorageQuota = $StorageQuota;
		
		return $this;
	}
	
	public function getBody() {
		$body = [];
		
		if ( !is_null( $this->ServerQuota ) ) {
			$body[] = [
				'value' => false,
				'path' => '/isServersQuotaUnlimited',
				'op' => 'replace',
			];
			$body[] = [
				'value' => $this->ServerQuota,
				'path' => '/serversQuota',
				'op' => 'replace',
			];
		}
		
		if ( !is_null( $this->WorkstationQuota ) ) {
			$body[] = [
				'value' => false,
				'path' => '/isWorkstationsQuotaUnlimited',
				'op' => 'replace',
			];
			$body[] = [
				'value' => $this->WorkstationQuota,
				'path' => '/workstationsQuota',
				'op' => 'replace',
			];
		}
		
		if ( !is_null( $this->VmQuota ) ) {
			$body[] = [
				'value' => false,
				'path' => '/isVmsQuotaUnlimited',
				'op' => 'replace',
			];
			$body[] = [
				'value' => $this->VmQuota,
				'path' => '/vmsQuota',
				'op' => 'replace',
			];
		}
		
		if ( !is_null( $this->StorageQuota ) ) {
			$body[] = [
				'value' => $this->StorageQuota,
				'path' => '/storageQuota',
				'op' => 'replace',
			];
		}
		
		return json_encode( $body );
	}
	
	public function getContentType(): string {
		return 'application/json';
	}
}
