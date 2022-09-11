<?php

namespace App\Http\Controllers;

use App\DTO\StreamDTO;
use App\Http\Resources\Stream\StreamResource;
use App\Models\Stream;
use App\Services\AntMediaServerService;
use App\Services\ImageService;
use App\Services\StreamService;
use App\Http\Requests\Stream\StoreRequest;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class StreamController extends Controller
{
    public function __construct(private StreamService $streamService,
                                private ImageService $imageService,
                                private AntMediaServerService $mediaServerService)
    {
    }


    /**
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $streams = $this->streamService->getStreamsWithFillters($request);

        return StreamResource::collection($streams);
    }

    /**
     * @param StoreRequest $request
     * @return StreamResource
     * @throws ValidationException|GuzzleException
     */
    public function store(StoreRequest $request): StreamResource
    {

        $image = $this->imageService->createImage($request->file('image'));
        $streamDTO = StreamDTO::fromArray(array_merge($request->validated(),[
            'image_id'=>$image->id
        ]));

        $stream = $this->streamService->createStream($streamDTO);
        $streamInfo = $this->mediaServerService->getStream($stream->user?->userStreamKey?->key);

        return new StreamResource($stream, $streamInfo);
    }

    /**
     * @param Stream $stream
     * @return StreamResource
     * @throws GuzzleException
     */
    public function show(Stream $stream): StreamResource
    {
        $streamInfo = $this->mediaServerService->getStream($stream->user?->userStreamKey?->key);

        return new StreamResource($stream, $streamInfo);
    }
}
