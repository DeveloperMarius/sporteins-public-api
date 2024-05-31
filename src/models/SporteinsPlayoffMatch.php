<?php

namespace developermarius\sporteins\publicapi\models;

use utils\DataClass;

/**
 * @method SporteinsMatch[] getMatches()
 * @method int getHomePlayoffScore()
 * @method int getAwayPlayoffScore()
 * @method SporteinsCompetitor getHomeTeam()
 * @method SporteinsCompetitor getAwayTeam()
 */
class SporteinsPlayoffMatch extends DataClass{

    protected array $matches;
    protected int $home_playoff_score;
    protected int $away_playoff_score;
    protected SporteinsCompetitor $home_team;
    protected SporteinsCompetitor $away_team;

    public function __construct(array $data){
        $this->setProperties($data, array(
            'matches' => SporteinsMatch::class,
            'home_team' => SporteinsCompetitor::class,
            'away_team' => SporteinsCompetitor::class
        ), array(
            'homePlayoffScore' => 'home_playoff_score',
            'awayPlayoffScore' => 'away_playoff_score',
            'homeTeam' => 'home_team',
            'awayTeam' => 'away_team'
        ));
    }
}