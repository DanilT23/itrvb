<?php
namespace Tgu\Tolkov\Model;
class User
{
    function __construct(private UUID $uuid, private string $username, private Name $name)
    {

    }
    public function getUuid(): UUID {
        return $this->uuid;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function getName(): Name {
        return $this->name;
    }
    function __toString()
    {
        return "$this->username $this->name";
    }
}