<?php

namespace developermarius\sporteins\publicapi\models;

use utils\DataClass;

/**
 * @method string getId()
 * @method string getName()
 * @method int|null getSort()
 * @method string getImageUrl()
 * @method string|null getIconName()
 * @method string getSportName()
 * @method string getSportGroupIdentifier()
 * @method SporteinsSportIdentifier getSportIdentifier()
 */
class SporteinsSportGroup extends DataClass{

    protected string $id;
    protected string $name;
    protected ?int $sort;
    protected string $image_url;
    protected ?string $icon_name = null;
    protected string $sport_name;
    protected SporteinsSportGroupIdentifier $sport_group_identifier;
    protected SporteinsSportIdentifier $sport_identifier;

    public function __construct(array $data){
        $this->setProperties($data, array(
            'sport_group_identifier' => SporteinsSportGroupIdentifier::class,
            'sport_identifier' => SporteinsSportIdentifier::class
        ), array(
            'imageUrl' => 'image_url',
            'iconName' => 'icon_name',
            'sportName' => 'sport_name',
            'sportGroupIdentifier' => 'sport_group_identifier',
            'sportIdentifier' => 'sport_identifier'
        ));
    }
}