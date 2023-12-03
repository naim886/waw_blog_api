<?php

namespace App\Models\Trait;

trait CreatedUpdatedBy
{
    final public static function bootCreatedUpdatedBy(): void
    {
        static::creating(static function ($model) {
            $model->created_by = auth()->id();
        });

        static::updating(static function ($model) {
            $model->updated_by = auth()->id();
        });
    }
}
