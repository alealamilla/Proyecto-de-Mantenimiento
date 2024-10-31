<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Car
 *
 * @property $id
 * @property $owner_id
 * @property $color_id
 * @property $brand_id
 * @property $type_id
 * @property $placas
 * @property $year
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Brand $brand
 * @property Color $color
 * @property Owner $owner
 * @property Type $type
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Car extends Model
{
    use SoftDeletes;


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['owner_id', 'color_id', 'brand_id', 'type_id', 'placas', 'year'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(\App\Models\Brand::class, 'brand_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function color()
    {
        return $this->belongsTo(\App\Models\Color::class, 'color_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(\App\Models\Owner::class, 'owner_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(\App\Models\Type::class, 'type_id', 'id');
    }
    

}
