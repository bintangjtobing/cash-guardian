<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PettyCashReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'report_date'
    ];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pettyCashTransactions()
    {
        return $this->hasMany(PettyCashTransaction::class);
    }
}
