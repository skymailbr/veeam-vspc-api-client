<?php

namespace Skymail\VeeamVspcApiClient\Repositories;

use Skymail\VeeamVspcApiClient\CreateCompanyBackupResourcePayload;
use Skymail\VeeamVspcApiClient\CreateCompanyPayload;
use Skymail\VeeamVspcApiClient\CreateCompanySiteResourcePayload;
use Skymail\VeeamVspcApiClient\EditCompanyBackupResourcePayload;
use Skymail\VeeamVspcApiClient\ModifyCompanyPayload;
use Skymail\VeeamVspcApiClient\Support\CreateDeleteRequest;
use Skymail\VeeamVspcApiClient\Support\CreateGetRequest;
use Skymail\VeeamVspcApiClient\Support\CreatePatchRequest;
use Skymail\VeeamVspcApiClient\Support\CreatePostRequest;
use Skymail\VeeamVspcApiClient\Support\RequestBuilder;

class CompanyRepository implements Repository {
	use CreatePostRequest;

	use CreateGetRequest;

	use CreatePatchRequest;

	use CreateDeleteRequest;

	public function getBaseRoute(): string {
		return 'organizations/companies';
	}

	public function getAll(): RequestBuilder {
		return $this->createGetRequest( '/' );
	}

	public function getAllCompanyBackupResources( string $companyUid, string $siteUid ): RequestBuilder {
		return $this->createGetRequest( sprintf( '/%s/sites/%s/backupResources', $companyUid, $siteUid ) );
	}

	public function getBackupResourceUsage( string $companyUid, string $siteUid ): RequestBuilder {
		return $this->createGetRequest( sprintf( '/%s/sites/%s/backupResources/usage', $companyUid, $siteUid ) );
	}

	public function postCreate( CreateCompanyPayload $request ): RequestBuilder {
		return $this->createPostRequest( '', $request );
	}

	public function patchModifyCompany( string $companyUid, ModifyCompanyPayload $payload ): RequestBuilder {
		return $this->createPatchRequest( sprintf( '/%s', $companyUid ), $payload );
	}

	public function postCreateCompanySiteResource( string $companyUid, CreateCompanySiteResourcePayload $request ): RequestBuilder {
		return $this->createPostRequest( sprintf( '/%s/sites', $companyUid ), $request );
	}

	public function postCreateCompanyBackupResource( string $companyUid, string $siteUid, CreateCompanyBackupResourcePayload $request ): RequestBuilder {
		return $this->createPostRequest( sprintf( '/%s/sites/%s/backupResources', $companyUid, $siteUid ), $request );
	}

	public function patchEditCompanyBackupResource( string $companyUid, string $siteUid, string $resourceUid, EditCompanyBackupResourcePayload $payload ): RequestBuilder {
		return $this->createPatchRequest( sprintf( '/%s/sites/%s/backupResources/%s', $companyUid, $siteUid, $resourceUid ), $payload );
	}

	public function delete( string $companyUid ): RequestBuilder {
		return $this->createDeleteRequest( '/' . $companyUid );
	}

	public function get( string $companyUid ): RequestBuilder {
		return $this->createGetRequest( '/' . $companyUid );
	}

	public function deleteCompanyBackupResource( string $companyUid, string $siteUid, string $resourceUid ): RequestBuilder {
		return $this->createDeleteRequest( sprintf( '/%s/sites/%s/backupResources/%s', $companyUid, $siteUid, $resourceUid ) );
	}
}
