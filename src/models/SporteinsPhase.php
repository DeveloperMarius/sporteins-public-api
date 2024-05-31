<?php

namespace developermarius\sporteins\publicapi\models;

use utils\DataClass;

/**
 * @method int getSort()
 * @method string getType()
 * @method SporteinsPhaseType getName()
 */
class SporteinsPhase extends DataClass{

    protected int $sort;
    protected string $type;
    protected SporteinsPhaseType $name;

    public function __construct(array $data){
        $this->setProperties($data, array(
            'name' => SporteinsPhaseType::class
        ));
    }
}