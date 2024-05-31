<?php

namespace developermarius\sporteins\publicapi\models;

use utils\DataClass;

/**
 * "id": "sr:venue:7046",
 * "venueName": "Palacio de Deportes de Murcia",
 * "name": "Palacio de Deportes de Murcia",
 * "city": "Murcia",
 * "country": "Spain",
 * "countryCode": "ESP",
 * "nationality": {
 * "name": "Spain",
 * "imageUrl": "https:\/\/reshape.sport1.de\/c\/s\/flags\/esp\/0x200"
 * },
 * "capacity": 7341,
 * "mapCoordinates": "37.994036,-1.112783"
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
    protected ?string $map_coordinates;

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