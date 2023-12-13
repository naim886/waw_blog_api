<?php

namespace App\Models;

use App\Manager\Image\ImageManager;
use App\Manager\Utility\Utility;
use App\Models\Trait\CreatedUpdatedBy;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Http\Request;

class Seo extends Model
{
    use HasFactory, CreatedUpdatedBy;

    protected $guarded = [];

    public const IMAGE_UPLOAD_PATH = 'image/uploads/seo/';
    public const IMAGE_WIDTH = 1200;
    public const IMAGE_HEIGHT = 630;


    /**
     * @param Request $request
     * @param Model $model
     * @return mixed
     * @throws Exception
     */
    final public function store_seo(Request $request, Model $model): mixed
    {
        return $model->seo()->create($this->prepareData($request));
    }

    /**
     * @throws Exception
     */
    public function update_seo(Request $request, Model $model)
    {
        return $model->seo()->update($this->prepareData($request, $model));
    }

    /**
     * @throws Exception
     */
    private function prepareData(Request $request, Model|null $model = null): array
    {
        $data = [
            'meta_title'       => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
            'meta_keywords'    => $request->input('meta_keywords'),
        ];

        if ($request->hasFile('og_image')) {
            if ($model) {
                $data['og_image'] = (new ImageManager())
                    ->file($request->file('og_image'))
                    ->name(Utility::prepare_name($request->input('meta_title')))
                    ->path(self::IMAGE_UPLOAD_PATH)
                    ->height(self::IMAGE_HEIGHT)
                    ->width(self::IMAGE_WIDTH)
                    ->remove_old_image($model?->seo?->og_image)
                    ->upload();
            } else {
                $data['og_image'] = (new ImageManager())
                    ->file($request->file('og_image'))
                    ->name(Utility::prepare_name($request->input('meta_title')))
                    ->path(self::IMAGE_UPLOAD_PATH)
                    ->height(self::IMAGE_HEIGHT)
                    ->width(self::IMAGE_WIDTH)
                    ->upload();
            }
        }


        return $data;
    }

    /**
     * @return BelongsTo
     */
    final public function created_by(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    /**
     * @return BelongsTo
     */
    final public function updated_by(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by_id');
    }

    /**
     * @return MorphTo
     */
    final public function seoable(): MorphTo
    {
        return $this->morphTo();
    }
}
