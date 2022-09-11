<?php


namespace App\Http\Filters\Streams;


use App\Http\Filters\QueryFilter;

class StreamFilter extends QueryFilter
{

    function title(string $text){
        $this->builder->where('title',$text);
    }

    function description(string $text){
        $this->builder->where('description',$text);
    }
}
