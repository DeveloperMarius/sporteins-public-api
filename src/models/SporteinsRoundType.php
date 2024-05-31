<?php

namespace developermarius\sporteins\publicapi\models;

use utils\DataClass;

enum SporteinsRoundType implements \JsonSerializable{

    case ROUND;
    case FIRST_ROUND;
    case SECOND_ROUND;
    case THIRD_ROUND;
    case ROUND_OF_16;
    case PLAY_IN_TOURNAMENT_ROUND_ONE;
    case PLAY_OFFS;
    case QUARTER_FINALS;
    case SEMI_FINALS;
    case THIRD_PLACE;
    case FINAL;

    public function getTitle(): string{
        return match($this){
            self::ROUND => 'Runde',
            self::FIRST_ROUND => '1. Runde',
            self::SECOND_ROUND => '2. Runde',
            self::THIRD_ROUND => '3. Runde',
            self::ROUND_OF_16 => 'Achtelfinale',
            self::PLAY_IN_TOURNAMENT_ROUND_ONE => 'Play-In Turnier Runde Finale',
            self::PLAY_OFFS => 'Play-Offs',
            self::QUARTER_FINALS => 'Viertelfinale',
            self::SEMI_FINALS => 'Halbfinale',
            self::THIRD_PLACE => 'Spiel um Platz 3',
            self::FINAL => 'Finale'
        };
    }

    public function jsonSerialize(): mixed{
        return $this->name;
    }
}
