<?php

namespace App\Services;

use App\Models\Brand;
use App\Models\ModelItem;

/**
 * Class GeneralService
 * @package App\Services
 */
class GeneralService
{

    public static function brandArray(){
        return Brand::pluck('name', 'id')
            ->toArray();
    }

    public static function modelItemArray($brand_id = null){
        return ModelItem::pluck('name', 'id')
            ->toArray();
    }

}
