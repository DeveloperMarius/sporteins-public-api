<?php

namespace developermarius\sporteins\publicapi\models;

use utils\DataClass;

/**
 * @method SporteinsCompetition getCompetition()
 * @method SporteinsMatch[]|null getMatches()
 * @method SporteinsPlayoffMatch[]|null getPlayoffMatches()
 */
class SporteinsMatchesResponse extends DataClass{

    protected SporteinsCompetition $competition;
    protected ?array $matches = null;
    protected ?array $playoff_matches = null;

    public function __construct(array $data){
        $this->setProperties($data, array(
            'competition' => SporteinsCompetition::class,
            'matches' => SporteinsMatch::class,
            'playoff_matches' => SporteinsPlayoffMatch::class
        ), array(
            'playoffMatches' => 'playoff_matches'
        ));
    }

}