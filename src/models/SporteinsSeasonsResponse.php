<?php

namespace developermarius\sporteins\publicapi\models;

use utils\DataClass;

/**
 * @method SporteinsSeason[] getSeasons()
 */
class SporteinsSeasonsResponse extends DataClass{

    public array $seasons;

    public function __construct(array $data){
        $this->setProperties($data, array(
            'seasons' => SporteinsSeason::class,
        ));
    }

}