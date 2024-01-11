<?php

namespace Tgu\Tolkov\Model;

use Tgu\Tolkov\Model\Name;

class Person {
    public function __construct(
        private Name $name,
        private \DateTimeImmutable $regiseredOn
    ) {

    }

    public function __toString(): string {
        return $this->name . ' (на сайте с ' . $this->regiseredOn->format('Y-m-d') . ')';
    }
}