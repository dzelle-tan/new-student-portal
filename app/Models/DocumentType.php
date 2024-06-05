<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DocumentType extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'document_name',
        'price',
    ];

    public function requestedDocs(): HasMany
    {
        return $this->hasMany(RequestedDocument::class);
    }
}
