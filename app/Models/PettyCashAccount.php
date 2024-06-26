<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PettyCashAccount extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'group_id'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];


    public function group()
    {
        return $this->belongsTo(PettyCashAccountGroup::class);
    }
}
