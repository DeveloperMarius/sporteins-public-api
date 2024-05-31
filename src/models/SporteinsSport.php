<?php

namespace developermarius\sporteins\publicapi\models;

use utils\DataClass;

/**
 * @method string getId()
 * @method string getName()
 * @method int getSort()
 * @method string getSportIdentifier()
 * @method SporteinsSportGroup getSportGroup()
 */
class SporteinsSport extends DataClass{

    protected string $id;
    protected string $name;
    protected int $sort;
    protected SporteinsSportIdentifier $sport_identifier;
    protected SporteinsSportGroup $sport_group;

    public function __construct(array $data){
        $this->setProperties($data, array(
            'sport_identifier' => SporteinsSportIdentifier::class,
            'sport_group' => SporteinsSportGroup::class
        ), array(
            'sportIdentifier' => 'sport_identifier',
            'sportGroup' => 'sport_group'
        ));
    }
}