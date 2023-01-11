<?php


namespace Shellrent\VeeamVspcApiClient\Payloads;


class ModifyCompanyPayload implements Payload {
	private array $Modifiers = [];
	
	public function addModifier( $value, string $path, string $operation ) {
		$this->Modifiers[] = [
			'value' => $value,
			'path' => $path,
			'op' => $operation,
		];
		
		return $this;
	}
	
	public function getBody() {
		return json_encode( $this->Modifiers );
	}
	
	public function getContentType(): string {
		return 'application/json';
	}
}