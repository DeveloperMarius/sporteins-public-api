<?php

namespace developermarius\sporteins\publicapi\models;

enum SporteinsMatchResultType implements \JsonSerializable{

    case NORMAL_RESULT;
    case POSTPONED;
    case AGGREGATE;
    case PENALTY_SHOOTOUT;
    case AFTER_EXTRA_TIME;
    case AFTER_PENALTY;
    case CANCELLED;

    public function jsonSerialize(): mixed{
        return $this->name;
    }
}
