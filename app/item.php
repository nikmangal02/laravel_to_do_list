<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    protected $table = 'item';
    protected $primaryKey = 'id';
   /* protected $fillable = array
    (
        'name',
        'description',
        'quantity'
    );*/
   protected $guarded = array('id');

    public $timestamps = false;

    public function store()
    {
         return $this->belongsTo(store::class,'store_id');
    }
}
