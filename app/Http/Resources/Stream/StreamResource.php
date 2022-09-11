<?php

namespace App\Http\Resources\Stream;

use App\Http\Resources\UserResource;
use App\Services\ImageService;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use JsonSerializable;

class StreamResource extends JsonResource
{
    private $streamInfo;

    /**
     * StreamResource constructor.
     * @param $resource
     * @param  $streamInfo
     */
    public function __construct($resource, $streamInfo = null)
    {
        $this->streamInfo = $streamInfo;
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        $full = is_object($this->streamInfo)  ? $this->getFull() : [];

        return array_merge([
            'id'=> $this->id,
            'title'=>  $this->title,
            'description'=> $this->description,
            'image'=> $this->image?->url,
        ], $full);
    }

    /**
     * @return null[]|object[]
     */
    private function getFull(): array
    {

        return [
            'stream' => $this->streamInfo,
            'user'=> new UserResource($this->user),
        ];
    }
}
