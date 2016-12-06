<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\item;

class store extends Model
{
    protected $table = 'store';
    protected $primaryKey = 'id';
    protected $fillable = array(
        'store_name',
        'store_addr'
    );
    public $timestamps = false;

    public function item()
    {
        return $this->belongsTo(item::class,'id');
    }
}
