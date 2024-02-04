<?php

namespace Bytic\SignedUrl\Tests\Signers;

use Bytic\SignedUrl\Signers\BaseUrlSigner;
use PHPUnit\Framework\TestCase;

class BaseUrlSignerTest extends TestCase
{
    public function test_sign()
    {
        $signer = new BaseUrlSigner('key');
        $url = $signer->sign('http://example.com', 3600);
        self::assertStringContainsString('http://example.com', $url);
        self::assertStringContainsString('signature=', $url);
        self::assertStringContainsString('expires=', $url);
    }
}
