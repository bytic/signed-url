<?php

namespace Bytic\SignedUrl;

use Bytic\SignedUrl\Signers\BaseUrlSigner;
use Bytic\SignedUrl\Utility\PackageConfig;
use Bytic\PackageBase\BaseBootableServiceProvider;

/**
 * Class AuditServiceProvider
 * @package ByTIC\Audit
 */
class SignedUrlServiceProvider extends BaseBootableServiceProvider
{
    public const NAME = 'signed-url';

    public const SIGNER = 'signed-url.signer';

    /**
     * @inheritdoc
     */
    public function register()
    {
        $this->registerSigner();
    }

    protected function registerSigner()
    {
        $this->getContainer()->share(self::SIGNER, function () {
            $signatureKey = PackageConfig::signatureKey();
            $expiresParameterName = PackageConfig::expiresParameterName();
            $signatureParameterName = PackageConfig::signatureParameterName();
            $signer = new BaseUrlSigner(
                $signatureKey,
                $expiresParameterName,
                $signatureParameterName
            );
            return $signer;
        });
    }

    /**
     * @inheritdoc
     */
    public function provides()
    {
        return [
            self::SIGNER
        ];
    }
}
