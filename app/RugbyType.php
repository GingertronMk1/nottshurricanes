<?php

namespace App;

enum RugbyType: string
{
    case TOUCH = 'touch';
    case UNION = 'union';

    /**
     * @return array<string, string>
     */
    public static function prettyCases(): array
    {
        $ret = [];
        foreach (self::cases() as $case) {
            $ret[$case->value] = ucfirst($case->value);
        }

        return $ret;
    }
}
