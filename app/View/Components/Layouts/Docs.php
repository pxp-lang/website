<?php

namespace App\View\Components\Layouts;

use App\Enums\DocumentationCategory;
use App\Models\Documentation;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Docs extends Component
{
    public function navigation(): array
    {
        return Documentation::query()
            ->get()
            ->groupBy(fn (Documentation $doc) => $doc->category->value)
            ->each(function (Collection $category) {
                $category->sortBy('order');
            })
            ->sortBy(function (Collection $collection, string $category) {
                return DocumentationCategory::from($category)->order();
            })
            ->mapWithKeys(function (Collection $collection, string $category) {
                return [
                    DocumentationCategory::from($category)->format() => $collection,
                ];
            })
            ->all();
    }

    public function render(): View
    {
        return view('components.layouts.docs');
    }
}
