<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'leadTitle',
        'leadName',
        'CompanyName',
        'leadStage',
        'price',
        'description',
    ];

    protected $casts = [
        'price' => 'float',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function newFactory()
    {
        return \Database\Factories\LeadFactory::new();
    }
}
