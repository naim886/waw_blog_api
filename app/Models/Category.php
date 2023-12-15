<?php

namespace App\Models;

use App\Manager\Image\ImageManager;
use App\Manager\Utility\Utility;
use App\Models\Trait\CreatedUpdatedBy;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory, CreatedUpdatedBy;

    protected $guarded = [];

    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 2;

    public const STATUS_LIST = [
        self::STATUS_ACTIVE   => 'Active',
        self::STATUS_INACTIVE => 'Inactive',
    ];

    public const IMAGE_UPLOAD_PATH = 'image/uploads/category/';
    public const IMAGE_WIDTH = 800;
    public const IMAGE_HEIGHT = 800;

    /**
     * @param Builder $builder
     * @return Builder
     */
    final public function scopeActive(Builder $builder): Builder
    {
        return $builder->where('status', self::STATUS_ACTIVE);
    }

    /**
     * @return LengthAwarePaginator
     */
    final public function get_category_list(): LengthAwarePaginator
    {
        return self::query()->with('parent')->paginate(20);
    }

    /**
     * @return mixed
     */
    final public function get_category_assoc(): mixed
    {
        return self::query()->active()->pluck('name', 'id');
    }

    /**
     * @param Request $request
     * @return Model
     * @throws Exception
     */
    final public function storeCategory(Request $request): Model
    {
        return self::query()->create($this->prepareData($request));
    }

    /**
     * @param Request $request
     * @param Model $category
     * @return bool
     * @throws Exception
     */
    final public function updateCategory(Request $request, Model $category): bool
    {
        return $category->update($this->prepareData($request, $category));
    }

    /**
     * @param Model $category
     * @return void
     */
    final public function delete_category(Model $category): void
    {
        (new Seo())->delete_seo($category);
        if (!empty($category->image)) {
            (new ImageManager())->remove_photo($category->image, self::IMAGE_UPLOAD_PATH);
        }
        $category->delete();
    }

    /**
     * @throws Exception
     */
    final public function prepareData(Request $request, Model|null $category = null): array
    {
        $data = [
            'name'        => $request->input('name'),
            'status'      => $request->input('status'),
            'parent_id'   => $request->input('parent_id'),
            'slug'        => Str::slug($request->input('slug')),
            'description' => $request->input('description'),
        ];

        if ($request->hasFile('photo')) {
            if ($category) {

                $data['image'] = (new ImageManager())
                    ->file($request->file('photo'))
                    ->name(Utility::prepare_name($request->input('name')))
                    ->path(self::IMAGE_UPLOAD_PATH)
                    ->height(self::IMAGE_HEIGHT)
                    ->width(self::IMAGE_WIDTH)
                    ->remove_old_image($category->image)
                    ->upload();
            } else {
                $data['image'] = (new ImageManager())
                    ->file($request->file('photo'))
                    ->name(Utility::prepare_name($request->input('name')))
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
     * @return MorphOne
     */
    final public function seo(): MorphOne
    {
        return $this->morphOne(Seo::class, 'seoable');
    }


    final public function parent(): BelongsTo
    {
        return $this->belongsTo(__CLASS__, 'parent_id');
    }

}
