<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];

	protected $table = 'sale';

	protected $fillable = [
        'user_id', 'customer_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	
}
