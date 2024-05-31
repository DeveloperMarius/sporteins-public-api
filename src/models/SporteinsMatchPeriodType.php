<?php

namespace developermarius\sporteins\publicapi\models;

enum SporteinsMatchPeriodType: string implements \JsonSerializable{

    //Match
    case FULL_TIME = 'FULL_TIME';
    case PRE_MATCH = 'PRE_MATCH';
    case POSTPONED = 'POSTPONED';

    //Match Asset Client Model
    case POST_MATCH = 'POST_MATCH';

    //Match Period Type
    case REGULAR_PERIOD = 'regular_period';
    case PENALTIES = 'penalties';
    case OVERTIME = 'overtime';

    public function jsonSerialize(): mixed{
        return $this->value;
    }
}