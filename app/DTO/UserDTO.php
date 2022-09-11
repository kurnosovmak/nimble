<?php


namespace App\DTO;

 class UserDTO extends BaseDTO
{
    public ?int $id;
    public ?string $name;
    public ?string $email;
    public ?string $password;
    public ?string $token_name;

}
