<?php

namespace developermarius\sporteins\publicapi\models;

use utils\DataClass;
use utils\Time;

/**
 * @method string getId()
 * @method SporteinsGameplanElementType|null getMatchType()
 * @method Time getScheduledStartTime()
 * @method bool getDateTbd()
 * @method int getHomeScore()
 * @method int|null getHomeHalfScore()
 * @method int getAwayScore()
 * @method int|null getAwayHalfScore()
 * @method SporteinsMatchPeriodType getPeriod()
 * @method SporteinsCompetitor getHomeTeam()
 * @method SporteinsCompetitor getAwayTeam()
 * @method SporteinsVenue getVenue()
 * @method bool isLive()
 */
class SporteinsRelatedMatch extends DataClass{

    protected string $id;
    protected ?SporteinsGameplanElementType $match_type;
    protected ?Time $actual_start_time = null;
    protected Time $scheduled_start_time;
    protected bool $date_tbd;
    protected int $home_score;
    protected ?int $home_half_score = null;
    protected int $away_score;
    protected ?int $away_half_score = null;
    protected SporteinsMatchPeriodType $period;
    protected SporteinsCompetitor $home_team;
    protected SporteinsCompetitor $away_team;
    protected SporteinsVenue $venue;
    protected bool $live;

    public function __construct(array $data){
        $this->setProperties($data, array(
            'match_type' => SporteinsGameplanElementType::class,
            'actual_start_time' => Time::class,
            'scheduled_start_time' => Time::class,
            'period' => SporteinsMatchPeriodType::class,
            'home_team' => SporteinsCompetitor::class,
            'away_team' => SporteinsCompetitor::class,
            'venue' => SporteinsVenue::class
        ), array(
            'matchType' => 'match_type',
            'scheduledStartTime' => 'scheduled_start_time',
            'dateTbd' => 'date_tbd',
            'homeScore' => 'home_score',
            'homeHalfScore' => 'home_half_score',
            'awayScore' => 'away_score',
            'awayHalfScore' => 'away_half_score',
            'homeTeam' => 'home_team',
            'awayTeam' => 'away_team',
            'isLive' => 'live'
        ));
    }
}