<?php

namespace developermarius\sporteins\publicapi\models;

use utils\DataClass;

/**
 * @method SporteinsMatchResultType|null getResultType()
 * @method int|null getAttendance()
 * @method int|null getBestOfSets()
 * @method int|null getMatchTime()
 * @method string|null getMatchMinute()
 * @method string|null getWinnerTeamId()
 */
class SporteinsMatchInfo extends DataClass{

    protected ?SporteinsMatchResultType $result_type = null;
    protected ?int $attendance = null;
    protected ?int $best_of_sets = null;
    protected ?int $match_time = null;
    protected ?string $match_minute = null;
    protected ?string $winner_team_id = null;

    public function __construct(array $data){
        $this->setProperties($data, array(
            'result_type' => SporteinsMatchResultType::class
        ), array(
            'resultType' => 'result_type',
            'bestOfSets' => 'best_of_sets',
            'matchTime' => 'match_time',
            'matchMinute' => 'match_minute',
            'winnerTeamId' => 'winner_team_id'
        ));
    }
}