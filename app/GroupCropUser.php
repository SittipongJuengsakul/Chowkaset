<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupCropUser extends Model
{
    protected $table = 'group_crop_users';
   	protected $primaryKey = 'gcu_id';
    
    public function CropsList()
	{
		return $this->has_many('App\Crops','crop_id', 'crop_id');
	}
}
