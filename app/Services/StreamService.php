<?php


namespace App\Services;


use App\DTO\StreamDTO;
use App\Http\Filters\Streams\StreamFilter;
use App\Http\Requests\Stream\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Stream;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;

class StreamService extends Service
{
    public function __construct(
        private Stream $stream,
        private User $user,
        private AntMediaServerService $mediaServerService
    )
    {
    }

    public function getStreamsWithFillters(Request $request): Collection
    {
        return $this->stream->filter(new StreamFilter($request))->orderBy('created_at', 'desc')->get();
    }

    public function createStream(StreamDTO $streamDTO): Stream
    {
        if($stream = $this->user->findOrFail(auth()->id())->stream){

            $stream->title = $streamDTO->title;
            $stream->description = $streamDTO->description;
            $stream->image_id = $streamDTO->image_id;
            $stream->save();

            return $stream;
        }

        return $stream = $this->stream->create(
            array_merge(
                $streamDTO->all(),
                [
                    'user_id' => auth()->id(),
                    'image_id' => $streamDTO->image_id
                ]
            )
        );
    }

}
