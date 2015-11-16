<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    protected $table = 'profiles';
   	protected $primaryKey = 'pf_id';

   	public function phone()
   	{
   		return $this->hasMany('App\Contacts','pf_id','pf_id')->where('tyct_type', '1');
   	}
   	public function email()
   	{
   		return $this->hasMany('App\Contacts','pf_id','pf_id')->where('tyct_type', '2');
   	}
   	public function facebook()
   	{
   		return $this->hasMany('App\Contacts','pf_id','pf_id')->where('tyct_type', '3');
   	}
}
