<?php

namespace App\Models;

use App\Enums\DocumentationCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Orbit\Concerns\Orbital;

class Documentation extends Model
{
    use HasFactory;
    use Orbital;

    protected $guarded = [];

    protected $casts = [
        'category' => DocumentationCategory::class,
    ];

    public static function schema(Blueprint $table)
    {
        $table->id();
        $table->string('title');
        $table->string('slug');
        $table->string('category');
        $table->longText('content')->nullable();
        $table->integer('order')->default(0);
    }

    public function previous(): ?Documentation
    {
        return static::query()
            ->where('category', $this->category)
            ->where('order', '<', $this->order)
            ->orderByDesc('order')
            ->first();
    }

    public function next(): ?Documentation
    {
        return static::query()
            ->where('category', $this->category)
            ->where('order', '>', $this->order)
            ->orderBy('order')
            ->first();
    }
}
