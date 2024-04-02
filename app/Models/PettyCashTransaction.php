<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PettyCashTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'petty_cash_account_id', 'description', 'amount', 'transaction_type', 'purchase_type_id', 'site_id', 'transaction_date'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'amount' => 'integer',
    ];

    public function pettyCashAccount()
    {
        return $this->belongsTo(PettyCashAccount::class);
    }

    public function purchaseType()
    {
        return $this->belongsTo(PurchaseType::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
