<?php

namespace developermarius\sporteins\publicapi\models;

enum SporteinsMatchAssetClientModelType implements \JsonSerializable{

    case VIDEO;

    public function jsonSerialize(): mixed{
        return $this->name;
    }
}
