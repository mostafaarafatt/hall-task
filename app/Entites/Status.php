<?php

namespace app\Entites;

class Status
{
    // here we can define constants for different order statuses
    const PENDING    = 'pending';
    const ACCEPTED   = 'accepted';
    const PROCESSING = 'processing';
    const DELIVERING = 'delivering';
    const RECEIVED   = 'received';
    const REJECTED   = 'rejected';
    const CANCELLED = 'cancelled';
    const RETURNED = 'returned';

    public static function getAllStatuses()
    {
        return [
            self::PENDING,
            self::ACCEPTED,
            self::PROCESSING,
            self::DELIVERING,
            self::RECEIVED,
            self::REJECTED,
            self::CANCELLED,
            self::RETURNED
        ];
    }
}
