<?php

namespace App\Ceams;

use App\Achievement;
use Illuminate\Support\Facades\Facade;



class Ceams extends Facade
{
     //Achivement for descriptions
    public static function achievement($description, $staff)
    {
        // $except = RecentlyViewed::where('product_id', $product)->where('customer_id', $customer)->first();
        // $products = RecentlyViewed::where('customer_id', $customer)->take(5)->get()->except($except->id);
        // return $products;
        $achievement = Achievement::where('job_desc_id', $description)->where('appraisee_id', $staff)->first();

        return $achievement;
    }
}
