<?php

namespace developermarius\sporteins\publicapi\models;

enum SporteinsPhaseType implements \JsonSerializable{

    case PHASE_REGULAR_SEASON;
    case PHASE_QUALIFICATION;

    public function jsonSerialize(): mixed{
        return $this->name;
    }
}