<?php
namespace Tgu\Tolkov;
class User
{
    function __construct(private int $id, private string $first_name, private string $last_name)
    {

    }

    function __toString()
    {
        return "$this->first_name $this->last_name";
    }
}