<?php

namespace developermarius\sporteins\publicapi\models;

enum SporteinsGameplaneElementType: string implements \JsonSerializable{

    case LEAGUE = 'league';
    case CUP = 'cup';
    case REGULAR = 'Regular';
    case FIRST_LEG = '1st Leg';//Hinspiel?
    case SECOND_LEG = '2nd Leg';//Rückspiel?

    public function jsonSerialize(): mixed{
        return $this->value;
    }
}
