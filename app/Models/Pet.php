<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pet extends Model
{
    use HasFactory;
    protected  $hidden =['updated_at','created_at'];

    protected $fillable = [
        'name',
        'breed',
        'age',
        'color',           
        'image',
        'user_id'   
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
