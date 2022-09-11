<?php


namespace App\DTO;


use Spatie\DataTransferObject\DataTransferObject;

abstract class BaseDTO extends DataTransferObject
{
    public static function fromArray(array $array){
        $selt = new static;
        foreach ($array as $key=>$item){
            $selt->{$key} = $item;
        }
        return $selt;
    }
}
