<?php

namespace Skymail\VeeamVspcApiClient\Repositories;

use Skymail\VeeamVspcApiClient\AddLicenseToVCSPPulsePayload;
use Skymail\VeeamVspcApiClient\EditPulseTenantPayload;
use Skymail\VeeamVspcApiClient\ModifyLicenseManagedInVCSPPulsePayload;
use Skymail\VeeamVspcApiClient\Support\CreateGetRequest;
use Skymail\VeeamVspcApiClient\Support\CreatePatchRequest;
use Skymail\VeeamVspcApiClient\Support\CreatePostRequest;
use Skymail\VeeamVspcApiClient\Support\RequestBuilder;

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
