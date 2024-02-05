<?php

declare(strict_types=1);

namespace Bytic\SignedUrl\Utility;

use Bytic\SignedUrl\SignedUrlServiceProvider;
use DateTimeInterface;
use Exception;

/**
 *
 */
class PackageConfig extends \ByTIC\PackageBase\Utility\PackageConfig
{
    protected $name = SignedUrlServiceProvider::NAME;

    public static function configPath(): string
    {
        return __DIR__ . '/../../config/signed-url.php';
    }


    /**
     * @return string|null
     * @throws Exception
     */
    public static function signatureKey(): ?string
    {
        return (string)static::instance()->get('signature_key');
    }

    public static function defaultExpiration(): int|DateTimeInterface
    {
        return static::instance()->get('default_expiration_time_in_seconds', 3600);
    }

    public static function expiresParameterName(): string
    {
        return static::instance()->get('parameters.expires', 'expires');
    }

    public static function signatureParameterName(): string
    {
        return static::instance()->get('parameters.signature', 'signature');
    }
}
