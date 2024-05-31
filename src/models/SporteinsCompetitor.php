<?php

namespace developermarius\sporteins\publicapi\models;

use utils\DataClass;

/**
 * @method string getId()
 * @method string getName()
 * @method string getCountry()
 * @method string getShortName()
 * @method string getCode()
 * @method string getImageUrl()
 * @method SporteinsNationality|null getNationality()
 */
class SporteinsCompetitor extends DataClass{

    protected string $id;
    protected string $name;
    protected ?string $country = null;
    protected string $short_name;
    protected string $code;
    protected ?string $image_url = null;
    protected ?SporteinsNationality $nationality = null;

    public function __construct(array $data){
        $this->setProperties($data, array(
            'nationality' => SporteinsNationality::class
        ), array(
            'shortName' => 'short_name',
            'imageUrl' => 'image_url',
        ));
    }

    public function isDummyName(): bool{
        return $this->getName() === 'N. N.';
    }
}