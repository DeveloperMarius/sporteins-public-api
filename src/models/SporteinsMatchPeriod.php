<?php

namespace developermarius\sporteins\publicapi\models;

use utils\DataClass;

/**
 * @method int getPeriod()
 * @method int getHomeScore()
 * @method int getAwayScore()
 * @method SporteinsMatchPeriodType getType()
 */
class SporteinsMatchPeriod extends DataClass{

    protected int $period;
    protected int $home_score;
    protected int $away_score;
    protected SporteinsMatchPeriodType $type;

    public function __construct(array $data){
        $this->setProperties($data, array(
            'type' => SporteinsMatchPeriodType::class
        ), array(
            'homeScore' => 'home_score',
            'awayScore' => 'away_score'
        ));
    }
}