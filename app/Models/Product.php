<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'description',
        'prince',
        'quantity'
    ];

    protected $casts = [
        'prince' => 'decimal:2'
    ];

    public function User(): BelongsTo
    {
    return $this->belongsTo(User::class);
    }

    public function Category(): BelongsTo
    {
    return $this->belongsTo(Category::class);
    }
}
