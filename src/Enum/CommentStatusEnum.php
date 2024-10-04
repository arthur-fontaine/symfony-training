<?php
declare(strict_types=1);

namespace App\Enum;

enum CommentStatusEnum: string
{
    case VALIDATED = 'validated';
    case PENDING_VALIDATION = 'pending_validation';
    case REJECTED = 'rejected';
}
