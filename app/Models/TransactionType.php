<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionType extends Model
{
    protected $fillable  = ['name', 'active'];

    public function team(): BelongsTo{
        return $this->belongsTo(Team::class);
    }
    public function transactions()
    {
        return $this->hasMany(Transactions::class, 'transaction_type_id');  // 'transaction_type_id' es la clave foránea en 'transactions'
    }
}
