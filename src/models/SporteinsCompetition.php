<?php

namespace developermarius\sporteins\publicapi\models;

use utils\DataClass;

/**
 * @method string getId()
 * @method string getName()
 * @method string getImageUrl()
 * @method string|null getCountry()
 * @method string getCurrentSeasonId()
 * @method int getSort()
 * @method string getSportId()
 * @method null|SporteinsSportGroup getSportGroup()
 * @method null|SporteinsNationality getNationality()
 * @method bool hasStandings()
 * @method bool hasTicker()
 *
 * sport_group, nationality and country are not set in match details. For gameplans they are set.
 */
class SporteinsCompetition extends DataClass{

    protected string $id;
    protected string $name;
    protected string $image_url;
    protected ?string $country;
    protected string $current_season_id;
    protected int $sort;
    protected ?string $sport_id = null;
    protected ?SporteinsSeason $current_season = null;
    protected ?SporteinsSportGroup $sport_group;
    protected ?SporteinsNationality $nationality;
    protected bool $standings;
    protected bool $ticker;

    public function __construct(array $data){
        $this->setProperties($data, array(
            'current_season' => SporteinsSeason::class,
            'sport_group' => SporteinsSportGroup::class,
            'nationality' => SporteinsNationality::class,
        ), array(
            'imageUrl' => 'image_url',
            'currentSeasonId' => 'current_season_id',
            'sportId' => 'sport_id',
            'currentSeason' => 'current_season',
            'sportGroup' => 'sport_group',
            'hasStandings' => 'standings',
            'hasTicker' => 'ticker'
        ));
    }

}