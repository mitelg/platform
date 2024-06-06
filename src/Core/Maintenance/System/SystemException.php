<?php

declare(strict_types=1);

namespace Shopware\Core\Maintenance\System;

use Shopware\Core\Framework\HttpException;
use Shopware\Core\Framework\Log\Package;
use Symfony\Component\HttpFoundation\Response;

#[Package('core')]
class SystemException extends HttpException
{
    final public const MAINTENANCE_SYSTEM_CONSOLE_APPLICATION_NOT_FOUND = 'MAINTENANCE__SYSTEM_CONSOLE_APPLICATION_NOT_FOUND';

    public static function consoleApplicationNotFound(): self
    {
        return new self(
            Response::HTTP_INTERNAL_SERVER_ERROR,
            self::MAINTENANCE_SYSTEM_CONSOLE_APPLICATION_NOT_FOUND,
            'Symfony console application not found.'
        );
    }
}
