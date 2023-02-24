<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static ACTIVE()
 * @method static static PENDING()
 * @method static static EXPIRED()
 */
final class AppSubscriptionStatusEnum extends Enum
{
    const ACTIVE = 'active';
    const PENDING = 'pending';
    const EXPIRED = 'expired';
}
