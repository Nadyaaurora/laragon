<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SolutionForest\FilamentTree\Concern\ModelTree;

class MenuItem extends Model
{
    use ModelTree;
    protected $fillable = [
        'parent_id',
        'title',
        'url',
        'targer',
        'type',
        'order'
    ];

    protected $treeKey = 'id';
    protected $orderKey = 'order';
    protected $parentKey = 'parent_id';
    protected static function booted()
    {
        static::creating(function ($model) {
            if ($model->parent_id == -1 || $model->parent_id == '-1') {
                $model->parent_id = null;
            }
        });

        static::updating(function ($model) {
            if ($model->parent_id == -1 || $model->parent_id == '-1') {
                $model->parent_id = null;
            }
        });
    }
}
