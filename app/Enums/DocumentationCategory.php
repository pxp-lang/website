<?php

namespace App\Enums;

enum DocumentationCategory: string
{
    case Introduction = 'introduction';
    case Features = 'features';
    case Formatter = 'formatter';
    case LanguageServer = 'language-server';

    public function format(): string
    {
        return match ($this) {
            DocumentationCategory::LanguageServer => 'Language Server',
            default => $this->name,
        };
    }

    public function order(): int
    {
        return match ($this) {
            DocumentationCategory::Introduction => 0,
            DocumentationCategory::Features => 1,
            DocumentationCategory::Formatter => 2,
            DocumentationCategory::LanguageServer => 3,
        };
    }
}
