<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder as QueryBuilder;

/**
 * App\Models\PropertyImage
 *
 * @property int $id
 * @property string $property_id
 * @property string $path
 * @property-read Property $property
 * @method static EloquentBuilder|PropertyImage newModelQuery()
 * @method static EloquentBuilder|PropertyImage newQuery()
 * @method static QueryBuilder|PropertyImage onlyTrashed()
 * @method static EloquentBuilder|PropertyImage query()
 * @method static EloquentBuilder|PropertyImage whereId($value)
 * @method static EloquentBuilder|PropertyImage wherePath($value)
 * @method static EloquentBuilder|PropertyImage wherePropertyId($value)
 * @method static QueryBuilder|PropertyImage withTrashed()
 * @method static QueryBuilder|PropertyImage withoutTrashed()
 * @mixin Eloquent
 */
class PropertyImage extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    protected $table = 'property_images';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'property_id',
        'path',
    ];

    /**
     * Get the property that owns the image.
     *
     * @return BelongsTo
     */
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class, 'property_id', 'id');
    }
}
