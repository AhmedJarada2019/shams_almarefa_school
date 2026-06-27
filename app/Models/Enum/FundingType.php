<?php

namespace App\Models\Enum;

enum FundingType: string
{
    case platforms = "platforms";
    case saudi_fund = "saudi_fund";
    case customer_funds = "customer_funds";

    public static function options()
    {
        return collect(self::cases())
            ->mapWithKeys(function ($item){
               return [$item->value => __($item->value)];
            })->all();
}

}