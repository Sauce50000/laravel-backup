<?php

namespace App\Enums;

enum NewsCategory: string
{
    case CIRCULAR = 'परिपत्र/निर्देशन';
    case NOTICE = 'सूचना तथा समाचारहरु';
    case PRESS_RELEASE = 'प्रेस बिज्ञप्ति';
    case TENDER = 'बोलपत्र';
    case OTHER = 'अन्य';

    public function label(): string
    {
        return match($this) {
            self::CIRCULAR => 'परिपत्र/निर्देशन',
            self::NOTICE => 'सूचना तथा समाचारहरु',
            self::PRESS_RELEASE => 'प्रेस बिज्ञप्ति',
            self::TENDER => 'बोलपत्र',
            self::OTHER => 'अन्य',
        };
    }

    public static function all(): array
    {
        return [
            self::CIRCULAR,
            self::NOTICE,
            self::PRESS_RELEASE,
            self::TENDER,
            self::OTHER,
        ];
    }
}
