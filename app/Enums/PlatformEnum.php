<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static ANDROID()
 * @method static static IOS()
 */
final class PlatformEnum extends Enum
{
    const ANDROID = 'android';
    const IOS = 'ios';
}
