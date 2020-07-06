<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $table = 'stripe';
    protected $fillable = ['transection_id', 'payment_method', 'description', 'stripe_id', 'payment_status'];
    public $timestamp;
}
