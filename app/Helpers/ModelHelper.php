<?php

namespace App\Helpers;

// use Illuminate\Database\Eloquent\Model;

class ModelHelper
{
    public static function findModel($model, $id)
    {
        return $model::findOrFail($id);
    }

    public static function modelToArray($model, $id)
    {
        return $model::findOrFail($id)->toArray();
    }
}
