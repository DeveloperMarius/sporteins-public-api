<?php

namespace developermarius\sporteins\publicapi\models;

use utils\DataClass;

/**
 * @method string getId()
 * @method string getVenueName()
 * @method string getName()
 * @method string getCity()
 * @method string|null getCountry()
 * @method string|null getCountryCode()
 * @method SporteinsNationality|null getNationality()
 * @method int getCapacity()
 * @method string|null getMapCoordinates()
 */
class SporteinsVenue extends DataClass{

    protected string $id;
    protected string $venue_name;
    protected string $name;
    protected string $city;
    protected ?string $country = null;
    protected ?string $country_code = null;
    protected ?SporteinsNationality $nationality = null;
    protected int $capacity;
    protected ?string $map_coordinates = null;

    public function __construct(array $data){
        $this->setProperties($data, array(
            'nationality' => SporteinsNationality::class
        ), array(
            'venueName' => 'venue_name',
            'countryCode' => 'country_code',
            'mapCoordinates' => 'map_coordinates'
        ));
    }

    public function getLatitude(): ?float{
        if($this->map_coordinates === null)
            return null;
        return floatval(explode(',', $this->map_coordinates)[0]);
    }

    public function getLongitude(): ?float{
        if($this->map_coordinates === null)
            return null;
        return floatval(explode(',', $this->map_coordinates)[1]);
    }
}