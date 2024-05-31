<?php

namespace developermarius\sporteins\publicapi\models;

enum SporteinsCompetitionType: string implements \JsonSerializable{

    //Soccer
    case SOCCER_FIRST_BUNDESLIGA = 'opta_22';
    case SOCCER_SECOND_BUNDESLIGA = 'opta_87';
    case SOCCER_CHAMPIONS_LEAGUE = 'opta_5';
    case SOCCER_DFB_POKAL = 'opta_231';
    case SOCCER_FRAUEN_BUNDESLIGA = 'opta_564';

    //Handball
    case HANDBALL_BUNDESLIGA = 'sr:tournament:149';
    case HANDBALL_CHAMPIONS_LEAGUE = 'sr:tournament:30';
    case HANDBALL_HDHB_POKAL = 'sr:tournament:57';
    case HANDBALL_BUNDESLIGA_FRAUEN = 'sr:tournament:245';

    //Basketball
    case BASKETBALL_BBL = 'sr:tournament:227';
    case BASKETBALL_EUROLEAGUE = 'sr:tournament:138';
    case BASKETBALL_BBL_POKAL = 'sr:tournament:359';
    case BASKETBALL_CHAMPIONS_LEAGUE = 'sr:tournament:14051';

    public function getSlug(): string{
        return match ($this) {
            //Soccer
            self::SOCCER_FIRST_BUNDESLIGA => 'bundesliga',
            self::SOCCER_SECOND_BUNDESLIGA => '2-bundesliga',
            self::SOCCER_CHAMPIONS_LEAGUE => 'champions-league',
            self::SOCCER_DFB_POKAL => 'dfb-pokal',
            self::SOCCER_FRAUEN_BUNDESLIGA => 'frauen-bundesliga',
            //Handball
            self::HANDBALL_BUNDESLIGA => 'handball-bundesliga',
            self::HANDBALL_CHAMPIONS_LEAGUE => 'champions-league',
            self::HANDBALL_HDHB_POKAL => 'dhb-pokal',
            self::HANDBALL_BUNDESLIGA_FRAUEN => 'frauen-bundesliga',
            //Basketball
            self::BASKETBALL_BBL => 'bbl',
            self::BASKETBALL_EUROLEAGUE => 'euroleague',
            self::BASKETBALL_BBL_POKAL => 'bbl-pokal',
            self::BASKETBALL_CHAMPIONS_LEAGUE => 'basketball-champions-league',
        };
    }

    public function jsonSerialize(): mixed{
        return $this->value;
    }
}
