<?php

declare(strict_types=1);

namespace Bytic\SignedUrl\Signers;

use Bytic\SignedUrl\Utility\PackageConfig;
use DateTime;
use DateTimeInterface;
use Spatie\UrlSigner\Sha256UrlSigner;

class BaseUrlSigner extends Sha256UrlSigner
{
    public function sign(
        string                $url,
        int|DateTimeInterface $expiration = null,
        string                $signatureKey = null,
    ): string
    {
        $expiration ??= PackageConfig::defaultExpiration();

        return parent::sign($url, $expiration, $signatureKey);
    }
}