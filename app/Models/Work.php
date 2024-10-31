<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Work
 *
 * @property $id
 * @property $reception_id
 * @property $service_id
 * @property $sparepart_id
 * @property $time
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Reception $reception
 * @property Service $service
 * @property Sparepart $sparepart
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Work extends Model
{
    use SoftDeletes;


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['reception_id', 'service_id', 'sparepart_id', 'time', 'user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reception()
    {
        return $this->belongsTo(\App\Models\Reception::class, 'reception_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service()
    {
        return $this->belongsTo(\App\Models\Service::class, 'service_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sparepart()
    {
        return $this->belongsTo(\App\Models\Sparepart::class, 'sparepart_id', 'id');
    }
    

}
