<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crops extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'crops';
    protected $primaryKey = 'crop_id';
    
    //protected $fillable = ['crops_id','crop_latitude','crop_longitude','crop_product','crop_rai','crop_ngarn','crop_wah','crop_breed_id','crop_start_date','crop_begin_date','crop_crop_date','crop_end_date','crop_status'];
    public function user()
    {
        return $this->hasOne('App\GroupCropUser','crop_id');
    }
    
}
