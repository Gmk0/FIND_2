<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'push_notifications_enabled',
        'email_notifications_enabled',
        'send_invoice_enabled',
        'number_notifications_enabled',
        'theme',
    ];
}
