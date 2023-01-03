<?php

namespace Shellrent\VeeamVspcApiClient\Repositories;

use Shellrent\VeeamVspcApiClient\Payloads\AddLicenseToVCSPPulsePayload;
use Shellrent\VeeamVspcApiClient\Payloads\EditPulseTenantPayload;
use Shellrent\VeeamVspcApiClient\Payloads\ModifyLicenseManagedInVCSPPulsePayload;
use Shellrent\VeeamVspcApiClient\Support\CreateGetRequest;
use Shellrent\VeeamVspcApiClient\Support\CreatePatchRequest;
use Shellrent\VeeamVspcApiClient\Support\CreatePostRequest;
use Shellrent\VeeamVspcApiClient\Support\RequestBuilder;

class PulseRepository implements Repository {
	use CreatePostRequest;

	use CreatePatchRequest;

	use CreateGetRequest;
	
	public function getBaseRoute(): string {
		return 'pulse';
	}
	
	public function getAllRentalAgreementContracts(): RequestBuilder {
		return $this->createGetRequest( '/contracts' );
	}
	
	public function getPulseTenants() {
		return $this->createGetRequest( '/tenants' );
	}
	
	public function patchPulseTenant( string $tenantUid, EditPulseTenantPayload $payload ) {
		return $this->createPatchRequest( sprintf( '/tenants/%s', $tenantUid ), $payload );
	}
	
	public function postCreatePulseTenantByCompany( string $companyUid ) {
		return $this->createPostRequest( '/tenants' )
			->query( [
				'companyUid' => $companyUid
			] );
	}
	
	public function postAddLicenseToVCSPPulse( AddLicenseToVCSPPulsePayload $payload ): RequestBuilder {
		return $this->createPostRequest( '/licenses', $payload );
	}
	
	public function patchModifyLicenseManagedInVCSPPulse( string $licenseUid, ModifyLicenseManagedInVCSPPulsePayload $payload ): RequestBuilder {
		return $this->createPatchRequest( sprintf( '/licenses/%s', $licenseUid ), $payload );
	}
	
	public function getAllLicensesManagedInVcspPulse(): RequestBuilder {
		return $this->createGetRequest( '/licenses' );
	}
}
