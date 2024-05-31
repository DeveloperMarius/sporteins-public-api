<?php

namespace developermarius\sporteins\publicapi\models;

use utils\DataClass;
use utils\Time;

/**
 * @method string getId()
 * @method SporteinsGameplaneElementType getMatchType()
 * @method Time|null getActualStartTime()
 * @method string getScheduledStartTime()
 * @method bool getDateTbd()
 * @method int|null getHomeScore()
 * @method int|null getHomeHalfScore()
 * @method int|null getAwayScore()
 * @method int|null getAwayHalfScore()
 * @method SporteinsMatchPeriodType getPeriod()
 * @method SporteinsSport getSport()
 * @method SporteinsCompetitor getHomeTeam()
 * @method SporteinsCompetitor getAwayTeam()
 * @method SporteinsVenue getVenue()
 * @method SporteinsMatchAssetClientModel[]|null getMatchAssetClientModels()
 * @method SporteinsRoundType|null getRoundType()
 * @method int|null getMatchDay()
 * @method int|null getRoundNumber()
 * @method string getRoundTitle()
 * @method string|null getGroupName()
 * @method int|null getHomePlayoffScore()
 * @method int|null getAwayPlayoffScore()
 * @method SporteinsCompetition getCompetition()
 * @method SporteinsSeason getSeason()
 * @method SporteinsRelatedMatch|null getRelatedMatch()
 * @method SporteinsMatchInfo getMatchInfo()
 * @method bool hasTicker()
 * @method SporteinsPhase|null getPhase()
 * @method SporteinsMatchPeriod[]|null getPeriods()
 * @method bool isLive()
 */
class SporteinsMatch extends DataClass{

    protected string $id;
    protected SporteinsGameplaneElementType $match_type;
    protected ?Time $actual_start_time = null;
    protected Time $scheduled_start_time;
    protected bool $date_tbd;
    protected ?int $home_score = null;
    protected ?int $home_half_score = null;
    protected ?int $away_score = null;
    protected ?int $away_half_score = null;
    protected SporteinsMatchPeriodType $period;
    protected SporteinsSport $sport;
    protected SporteinsCompetitor $home_team;
    protected SporteinsCompetitor $away_team;
    protected SporteinsVenue $venue;
    protected ?array $match_asset_client_models = null;
    protected ?SporteinsRoundType $round_type = null;
    protected ?int $match_day = null;
    protected ?int $round_number = null;
    protected string $round_title;
    protected ?string $group_name = null;
    protected ?int $home_playoff_score = null;
    protected ?int $away_playoff_score = null;
    protected SporteinsCompetition $competition;
    protected SporteinsSeason $season;
    protected ?SporteinsRelatedMatch $related_match = null;
    protected SporteinsMatchInfo $match_info;
    protected bool $ticker;
    protected ?SporteinsPhase $phase = null;
    /** @var SporteinsMatchPeriod[]|null $periods */
    protected ?array $periods = null;
    protected bool $live;

    public function __construct(array $data){
        if(isset($data['matchType']) && $data['matchType'] === 'Cup')
            $data['matchType'] = 'cup';
        if(isset($data['matchInfo']) && sizeof($data['matchInfo']) === 0)
            $data['matchInfo'] = null;
        $this->setProperties($data, array(
            'match_type' => SporteinsGameplaneElementType::class,
            'actual_start_time' => Time::class,
            'scheduled_start_time' => Time::class,
            'period' => SporteinsMatchPeriodType::class,
            'sport' => SporteinsSport::class,
            'home_team' => SporteinsCompetitor::class,
            'away_team' => SporteinsCompetitor::class,
            'venue' => SporteinsVenue::class,
            'match_asset_client_models' => SporteinsMatchAssetClientModel::class,
            'round_type' => SporteinsRoundType::class,
            'competition' => SporteinsCompetition::class,
            'season' => SporteinsSeason::class,
            'related_match' => SporteinsRelatedMatch::class,
            'match_info' => SporteinsMatchInfo::class,
            'phase' => SporteinsPhase::class,
            'periods' => SporteinsMatchPeriod::class
        ), array(
            'matchType' => 'match_type',
            'actualStartTime' => 'actual_start_time',
            'scheduledStartTime' => 'scheduled_start_time',
            'dateTbd' => 'date_tbd',
            'homeScore' => 'home_score',
            'homeHalfScore' => 'home_half_score',
            'awayScore' => 'away_score',
            'awayHalfScore' => 'away_half_score',
            'homeTeam' => 'home_team',
            'awayTeam' => 'away_team',
            'matchAssetClientModels' => 'match_asset_client_models',
            'matchDay' => 'match_day',
            'roundNumber' => 'round_number',
            'roundType' => 'round_type',
            'roundTitle' => 'round_title',
            'groupName' => 'group_name',
            'homePlayoffScore' => 'home_playoff_score',
            'awayPlayoffScore' => 'away_playoff_score',
            'relatedMatch' => 'related_match',
            'matchInfo' => 'match_info',
            'hasTicker' => 'ticker',
            'isLive' => 'live'
        ));
    }
}