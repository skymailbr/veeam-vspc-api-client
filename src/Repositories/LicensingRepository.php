<?php

namespace Skymail\VeeamVspcApiClient\Repositories;

use Skymail\VeeamVspcApiClient\Support\CreateGetRequest;
use Skymail\VeeamVspcApiClient\Support\RequestBuilder;

class LicensingRepository implements Repository {
	use CreateGetRequest;

	public function getBaseRoute(): string {
		return 'licensing';
	}


	public function getConsoleUsages(): RequestBuilder {
		return $this->createGetRequest( '/console/usage' );
	}


	/**
	 * @param string $companyUid
	 *
	 * @return RequestBuilder
	 * @deprecated
	 */
	public function getConsoleUsagesByCompany( string $companyUid ): RequestBuilder {
		return $this->createGetRequest( sprintf( '/console/usage/companies/%s', $companyUid ) );
	}


	/**
	 * @param string $companyUid
	 *
	 * @return RequestBuilder
	 * @deprecated
	 */
	public function getUsageOfVeeamBackupReplicationLicensesByCompany( string $companyUid ): RequestBuilder {
		return $this->createGetRequest( '/backupServers/usage/companies/' . $companyUid );
	}


	/**
	 * @return RequestBuilder
	 * @deprecated
	 */
	public function getUsageOfVeeamBackupReplicationLicensesByAllCompanies(): RequestBuilder {
		return $this->createGetRequest( '/backupServers/usage/companies' );
	}


	/**
	 * @return RequestBuilder
	 * @deprecated
	 */
	public function getUsageOfAllVeeamBackupReplicationLicenses(): RequestBuilder {
		return $this->createGetRequest( '/backupServers/usage' );
	}


	public function getAllVeeamBackupReplicationLicenses(): RequestBuilder {
		return $this->createGetRequest( '/backupServers' );
	}


	public function getVeeamBackupReplicationLicense( string $backupServerUid ): RequestBuilder {
		return $this->createGetRequest( sprintf( '/backupServers/%s', $backupServerUid ) );
	}


	/**
	 * @param string $companyUid
	 *
	 * @return RequestBuilder
	 * @deprecated
	 */
	public function getUsageOfVeeamBackupForMicrosoft365LicensesByCompany( string $companyUid ): RequestBuilder {
		return $this->createGetRequest( sprintf( '/vbm365Servers/usage/companies/%s', $companyUid ) );
	}


	/**
	 * @param string $backupServerUid
	 *
	 * @return RequestBuilder
	 * @deprecated
	 */
	public function getUsageOfVeeamBackupReplicationLicense( string $backupServerUid ): RequestBuilder {
		return $this->createGetRequest( sprintf( '/backupServers/%s/usage', $backupServerUid ) );
	}


	public function getVeeamBackupForMicrosoft365License( string $vbm365ServerUid ): RequestBuilder {
		return $this->createGetRequest( sprintf( '/vb365Servers/%s', $vbm365ServerUid ) );
	}


	/**
	 * @return RequestBuilder
	 * @deprecated
	 */
	public function getUsageOfAllVeeamBackupForMicrosoft365Licenses(): RequestBuilder {
		return $this->createGetRequest( '/vbm365Servers/usage' );
	}


	public function getAllVeeamBackupForMicrosoft365Licenses(): RequestBuilder {
		return $this->createGetRequest( '/vb365Servers' );
	}


	public function getLicenseUsageByAllOrganizations(): RequestBuilder {
		return $this->createGetRequest( '/usage/organizations' );
	}


	public function getBackupServerLicense( string $serverUid ): RequestBuilder {
		return $this->createGetRequest( sprintf( "/backupServers/%s", $serverUid ) );
	}


	public function getBackupServersLicenses(): RequestBuilder {
		return $this->createGetRequest( '/backupServers' );
	}


	public function getVb365ServersLicenses(): RequestBuilder {
		return $this->createGetRequest( '/vb365Servers' );
	}


	public function getVb365ServerLicense( string $serverUid ): RequestBuilder {
		return $this->createGetRequest( '/vb365Servers/' . $serverUid );
	}
}
