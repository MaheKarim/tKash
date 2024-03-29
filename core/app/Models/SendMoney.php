<?php

namespace App\Models;

use App\Traits\Searchable;
use App\Traits\UserNotify;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SendMoney extends Model
{
    use HasFactory, Searchable;

    protected $guarded = ['id'];

    protected $table = 'send_moneys';

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

}
