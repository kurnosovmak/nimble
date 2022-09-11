<?php


namespace App\Services;


use App\DTO\ImageDTO;
use App\Models\Image;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Validation\ValidationException;

class ImageService extends Service
{
    // @todo config file with path
    public const PATH_TO_IMAGE = 'public/images/';

    public function __construct(private Image $image, private Filesystem $storage)
    {
    }

    /**
     * @param $image
     * @return Image
     */
    public function createImage($image): Image
    {
        if(!request()->hasFile('image')){
            throw ValidationException::withMessages(['image error']);
        }
        $unique_name = $this->generateUniqueName().'.'.$image->getClientOriginalExtension();
        Log::info($unique_name);
        $this->storage->put(self::PATH_TO_IMAGE.$unique_name, file_get_contents($image));

        return $this->image->create(['name'=>$unique_name]);
    }

    /**
     * @return string
     */
    private function generateUniqueName(): string
    {
        return md5(time());
    }
}
