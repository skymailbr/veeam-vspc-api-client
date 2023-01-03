<?php

namespace Shellrent\VeeamVspcApiClient\Payloads;

class CreateCompanyBackupResourcePayload implements Payload {
	private string $RepositoryUid;
	
	private string $RepositoryName;
	
	private int $StorageQuota;
	
	private ?int $ServerQuota = null;
	
	private ?int $WorkstationQuota = null;
	
	private ?int $VmQuota = null;
	
	private bool $IsServersQuotaUnlimited = false;
	
	private bool $IsWorkstationsQuotaUnlimited = false;
	
	private bool $IsVmsQuotaUnlimited = false;
	
	private bool $IsWanAccelerationEnabled = false;
	
	private ?string $WanAcceleratorUid = null;
	
	private bool $IsDefault = true;
	
	/**
	 * @param string $RepositoryUid
	 *
	 * @return CreateCompanyBackupResourcePayload
	 */
	public function setRepositoryUid( string $RepositoryUid ): CreateCompanyBackupResourcePayload {
		$this->RepositoryUid = $RepositoryUid;
		
		return $this;
	}
	
	/**
	 * @param string $RepositoryName
	 *
	 * @return CreateCompanyBackupResourcePayload
	 */
	public function setRepositoryName( string $RepositoryName ): CreateCompanyBackupResourcePayload {
		$this->RepositoryName = $RepositoryName;
		
		return $this;
	}
	
	/**
	 * @param string $StorageQuota
	 *
	 * @return CreateCompanyBackupResourcePayload
	 */
	public function setStorageQuota( int $StorageQuota ): CreateCompanyBackupResourcePayload {
		$this->StorageQuota = $StorageQuota;
		
		return $this;
	}
	
	/**
	 * @param string $ServerQuota
	 *
	 * @return CreateCompanyBackupResourcePayload
	 */
	public function setServerQuota( int $ServerQuota ): CreateCompanyBackupResourcePayload {
		$this->ServerQuota = $ServerQuota;
		
		return $this;
	}
	
	/**
	 * @param string $WorkstationQuota
	 *
	 * @return CreateCompanyBackupResourcePayload
	 */
	public function setWorkstationQuota( int $WorkstationQuota ): CreateCompanyBackupResourcePayload {
		$this->WorkstationQuota = $WorkstationQuota;
		
		return $this;
	}
	
	/**
	 * @param string $VmQuota
	 *
	 * @return CreateCompanyBackupResourcePayload
	 */
	public function setVmQuota( int $VmQuota ): CreateCompanyBackupResourcePayload {
		$this->VmQuota = $VmQuota;
		
		return $this;
	}
	
	/**
	 * @param bool $IsServersQuotaUnlimited
	 *
	 * @return CreateCompanyBackupResourcePayload
	 */
	public function setIsServersQuotaUnlimited( bool $IsServersQuotaUnlimited ): CreateCompanyBackupResourcePayload {
		$this->IsServersQuotaUnlimited = $IsServersQuotaUnlimited;

		return $this;
	}
	
	/**
	 * @param bool $IsWorkstationsQuotaUnlimited
	 *
	 * @return CreateCompanyBackupResourcePayload
	 */
	public function setIsWorkstationsQuotaUnlimited( bool $IsWorkstationsQuotaUnlimited ): CreateCompanyBackupResourcePayload {
		$this->IsWorkstationsQuotaUnlimited = $IsWorkstationsQuotaUnlimited;

		return $this;
	}
	
	/**
	 * @param bool $IsVmsQuotaUnlimited
	 *
	 * @return CreateCompanyBackupResourcePayload
	 */
	public function setIsVmsQuotaUnlimited( bool $IsVmsQuotaUnlimited ): CreateCompanyBackupResourcePayload {
		$this->IsVmsQuotaUnlimited = $IsVmsQuotaUnlimited;

		return $this;
	}
	
	/**
	 * @param bool $IsWanAccelerationEnabled
	 *
	 * @return CreateCompanyBackupResourcePayload
	 */
	public function setIsWanAccelerationEnabled( bool $IsWanAccelerationEnabled ): CreateCompanyBackupResourcePayload {
		$this->IsWanAccelerationEnabled = $IsWanAccelerationEnabled;

		return $this;
	}
	
	/**
	 * @param string|null $WanAcceleratorUid
	 *
	 * @return CreateCompanyBackupResourcePayload
	 */
	public function setWanAcceleratorUid( ?string $WanAcceleratorUid ): CreateCompanyBackupResourcePayload {
		$this->WanAcceleratorUid = $WanAcceleratorUid;

		return $this;
	}
	
	/**
	 * @param bool $IsDefault
	 *
	 * @return CreateCompanyBackupResourcePayload
	 */
	public function setIsDefault( bool $IsDefault ): CreateCompanyBackupResourcePayload {
		$this->IsDefault = $IsDefault;

		return $this;
	}
	
	public function getBody(): string {
		$body = [
			'repositoryUid' => $this->RepositoryUid,
			'cloudRepositoryName' => $this->RepositoryName,
			'storageQuota' => $this->StorageQuota,
			'serversQuota' => $this->ServerQuota,
			'isServersQuotaUnlimited' => $this->IsServersQuotaUnlimited,
			'workstationsQuota' => $this->WorkstationQuota,
			'isWorkstationsQuotaUnlimited' => $this->IsWorkstationsQuotaUnlimited,
			'vmsQuota' => $this->VmQuota,
			'isVmsQuotaUnlimited' => $this->IsVmsQuotaUnlimited,
			'isWanAccelerationEnabled' => $this->IsWanAccelerationEnabled,
			'wanAcceleratorUid' => $this->WanAcceleratorUid,
			'isDefault' => $this->IsDefault,
		];
		
		return json_encode( $body );
	}
	
	public function getContentType(): string {
		return 'application/json';
	}
}
