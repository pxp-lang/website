<?php

namespace App\Models;

use App\Enums\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Orbit\Concerns\Orbital;

class Post extends Model
{
    use HasFactory;
    use Orbital;

    protected $guarded = [];

    protected $casts = [
        'published_at' => 'datetime',
        'category' => Category::class,
    ];

    public static function schema(Blueprint $table)
    {
        $table->id();
        $table->string('title');
        $table->string('slug')->unique();
        $table->string('category')->nullable();
        $table->text('excerpt')->nullable();
        $table->longText('content')->nullable();
        $table->timestamp('published_at')->nullable();
    }
}
