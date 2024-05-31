<?php

namespace developermarius\sporteins\publicapi\models;

use utils\DataClass;

/**
 * @method SporteinsMatch getMatch()
 * @method array getMatchGoals()
 * @method array getMatchEvents()
 * @method array getPenaltyGoal()
 */
class SporteinsTickerResponse extends DataClass{

    protected SporteinsMatch $match;
    protected array $match_goals;
    protected array $match_events;
    protected array $penalty_goal;

    public function __construct(array $data){
        $this->setProperties($data, array(
            'match' => SporteinsMatch::class,
        ), array(
            'matchGoals' => 'match_goals',
            'matchEvents' => 'match_events',
            'penaltyGoal' => 'penalty_goal'
        ));
    }
}