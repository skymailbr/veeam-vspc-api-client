<?php

namespace Shellrent\VeeamVspcApiClient\Payloads;

interface Payload {
	public function getBody();
	
	public function getContentType(): string;
}
