<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'points',
        'category_id',
        'lang_id',
        'status',
        'createuser_id',
        'updateuser_id',
        'type',
        'file',
    ];
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class)->withDefault();
    }
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class)->withDefault();
    }
    
    public function createuser(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }
    public function updateuser(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }


}


