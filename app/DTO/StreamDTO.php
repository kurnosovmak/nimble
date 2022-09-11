<?php


namespace App\DTO;


class StreamDTO extends BaseDTO
{
    public ?string $title;
    public ?string $description;
    public ?int $user_id;
    public ?UserDTO $user;
    public ?int $image_id;

}
