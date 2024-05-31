<?php

namespace developermarius\sporteins\publicapi\models;

use utils\DataClass;

/**
 * @method string getName()
 * @method string getImageUrl()
 */
class SporteinsNationality extends DataClass{

    protected string $name;
    protected string $imageUrl;

    public function __construct(array $data){
        $this->setProperties($data);
    }
}