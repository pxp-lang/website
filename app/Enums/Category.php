<?php

namespace App\Enums;

enum Category: string
{
    case Development = 'development';
    case Insights = 'insights';

    public function color(): string
    {
        return match ($this) {
            Category::Development => 'red',
            Category::Insights => 'blue',
        };
    }
}
