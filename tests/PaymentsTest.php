<?php
use Altan\Rafinita\Payments;
use Altan\Rafinita\ResponseHandlerInterface;
use PHPUnit\Framework\TestCase;

class PaymentsTest extends TestCase
{
	private ResponseHandlerInterface $responseHandler;
    private Payments $payments;

	protected function setUp(): void
	{
		$this->responseHandler = new class() implements ResponseHandlerInterface {
            public function handleResponse(string $action, array $data) {
                return;
            }
        };
        $this->payments = new Payments($this->responseHandler, "api url", "client secret");
	}

	protected function tearDown(): void
	{
	}
}