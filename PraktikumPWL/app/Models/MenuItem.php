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
        'order'
    ];

    protected $treeKey = 'id';          
    protected $orderKey = 'order';      
    protected $parentKey = 'parent_id'; 
}