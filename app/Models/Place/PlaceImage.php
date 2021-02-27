<?php

namespace App\Models\Place;

use App\Traits\UploadImage;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class PlaceImage
 * @package App\Models\Place
 * @property integer $place_id
 * @property string $src
 */
class PlaceImage extends Model
{
    use CrudTrait;
    use UploadImage;

    private $uploadAttributeName = "src";
    private $uploadDisk = 'upload';
    private $uploadDestinationPath = "place_images";

    protected $table = 'places_images';
    protected $fillable = [
        'place_id',
        'src',
    ];

    public $timestamps = false;

    /**
     * @return BelongsTo
     */
    public function place(): BelongsTo
    {
        return $this->belongsTo(Place::class);
    }
}
