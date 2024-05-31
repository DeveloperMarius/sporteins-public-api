<?php

namespace developermarius\sporteins\publicapi\models;

use utils\DataClass;
use utils\Time;

/**
 * @method string|null getGroupName()
 * @method int|null getRoundNumber()
 * @method Time getFromDate()
 * @method Time getToDate()
 * @method int|null getMatchDay()
 * @method SporteinsRoundType|null getRoundType()
 * @method string getRoundTitle()
 * @method SporteinsGameplaneElementType|null getType()
 * @method SporteinsPhase|null getPhase()
 * @method bool|null isPlayoff()
 * @method bool|null isPlayDown()
 * @method bool|null isPostponed()
 *
 * If round_type is present, round_number will be present as well
 *
 * match_day or round_number will be present, or both.
 */
class SporteinsGameplanElement extends DataClass{

    protected ?string $group_name = null;
    protected ?int $round_number = null;
    protected Time $from_date;
    protected Time $to_date;
    protected ?int $match_day = null;
    protected ?SporteinsRoundType $round_type = null;
    protected string $round_title;
    protected ?SporteinsGameplaneElementType $type = null;
    protected ?SporteinsPhase $phase = null;
    protected ?bool $playoff = null;
    protected ?bool $play_down = null;
    protected ?bool $postponed = null;

    public function __construct(array $data){
        if(isset($data['roundNumber']) && !isset($data['roundType'])){
            $data['roundType'] = SporteinsRoundType::ROUND;
        }
        $this->setProperties($data, array(
            'from_date' => Time::class,
            'to_date' => Time::class,
            'round_type' => SporteinsRoundType::class,
            'type' => SporteinsGameplaneElementType::class,
            'phase' => SporteinsPhase::class
        ), array(
            'groupName' => 'group_name',
            'roundNumber' => 'round_number',
            'fromDate' => 'from_date',
            'toDate' => 'to_date',
            'matchDay' => 'match_day',
            'roundType' => 'round_type',
            'roundTitle' => 'round_title',
            'isPlayoff' => 'playoff',
            'isPlayDown' => 'play_down',
            'isPostponed' => 'postponed'
        ));
    }

}