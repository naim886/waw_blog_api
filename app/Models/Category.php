<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 2;

    public const STATUS_LIST = [
        self::STATUS_ACTIVE   => 'Active',
        self::STATUS_INACTIVE => 'Inactive',
    ];

    public function scopeActive(Builder $builder)
    {
        return $builder->where('status', self::STATUS_ACTIVE);
    }


    public function get_category_assoc()
    {
        return self::query()->active()->pluck('name', 'id');
    }

    public function storeCategory(Request $request)
    {
        return self::query()->create($this->prepareData($request));
    }

    final public function prepareData(Request $request): array
    {
        return [
            'name'        => $request->input('name'),
            'status'      => $request->input('status'),
            'parent_id'   => $request->input('parent_id'),
            'slug'        => Str::slug($request->input('slug')),
            'description' => $request->input('description'),
            'image'       => '',
        ];
    }

}
