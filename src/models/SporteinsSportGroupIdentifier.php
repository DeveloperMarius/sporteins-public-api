<?php

namespace developermarius\sporteins\publicapi\models;

enum SporteinsSportGroupIdentifier: string implements \JsonSerializable{

    case SOCCER = 'soccer';
    case HANDBALL = 'handball';
    case BASKETBALL = 'basketball';

    public function jsonSerialize(): mixed{
        return $this->value;
    }
}
