<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class SaleDes extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];

	protected $table = 'sale_des';

	protected $fillable = [
        'sale_id', 'description', 'quantity', 'amount', 
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
