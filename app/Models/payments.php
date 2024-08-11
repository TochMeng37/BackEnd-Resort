<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
    use HasFactory;
    protected $fillable = ['QRCode', 'Price', 'LastName', 'FirstName', 'PhoneNumber', 'Email', 'Facebook'];
    protected $table = 'payments';
}
