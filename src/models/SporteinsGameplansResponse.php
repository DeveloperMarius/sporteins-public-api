<?php

namespace developermarius\sporteins\publicapi\models;

use utils\DataClass;

/**
 * @method SporteinsCompetition getCompetition()
 * @method SporteinsRoundType|null getCurrentRoundType()
 * @method int|null getCurrentMatchday()
 * @method int|null getCurrentRoundNumber()
 * @method SporteinsPhase|null getCurrentPhase()
 * @method SporteinsGameplanElement getCurrentGameplanElement()
 * @method SporteinsGameplanElement[] getGameplan()
 *
 * current_matchday or current_round_number will be present.
 *
 * Rounds will be present for handball
 */
class SporteinsGameplansResponse extends DataClass{

    protected SporteinsCompetition $competition;
    protected ?SporteinsRoundType $current_round_type = null;
    protected ?int $current_matchday = null;
    protected ?int $current_round_number = null;
    protected ?SporteinsPhase $current_phase = null;
    protected SporteinsGameplanElement $current_gameplan_element;
    protected array $gameplan;

    public function __construct(array $data){
        $this->setProperties($data, array(
            'competition' => SporteinsCompetition::class,
            'current_round_type' => SporteinsRoundType::class,
            'current_phase' => SporteinsPhase::class,
            'current_gameplan_element' => SporteinsGameplanElement::class,
            'gameplan' => SporteinsGameplanElement::class
        ), array(
            'currentRoundType' => 'current_round_type',
            'currentMatchday' => 'current_matchday',
            'currentRoundNumber' => 'current_round_number',
            'currentPhase' => 'current_phase',
            'currentGameplanElement' => 'current_gameplan_element'
        ));
    }
}