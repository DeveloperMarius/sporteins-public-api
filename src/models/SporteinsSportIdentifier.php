<?php

namespace developermarius\sporteins\publicapi\models;

enum SporteinsSportIdentifier: string implements \JsonSerializable{

    case SOCCER = 'soccer';
    case HANDBALL = 'handball';
    case BASKETBALL = 'basketball';

    public function getSlug(): string{
        return $this->value;
    }

    /**
     * @return SporteinsCompetitionType[]
     */
    public function getCompetitionTypes(): array{
        return match ($this){
            self::SOCCER => array(
                SporteinsCompetitionType::SOCCER_FIRST_BUNDESLIGA,
                SporteinsCompetitionType::SOCCER_SECOND_BUNDESLIGA,
                SporteinsCompetitionType::SOCCER_CHAMPIONS_LEAGUE,
                SporteinsCompetitionType::SOCCER_DFB_POKAL,
                SporteinsCompetitionType::SOCCER_FRAUEN_BUNDESLIGA
            ),
            self::HANDBALL => array(
                SporteinsCompetitionType::HANDBALL_BUNDESLIGA,
                SporteinsCompetitionType::HANDBALL_CHAMPIONS_LEAGUE,
                SporteinsCompetitionType::HANDBALL_HDHB_POKAL,
                SporteinsCompetitionType::HANDBALL_BUNDESLIGA_FRAUEN
            ),
            self::BASKETBALL => array(
                SporteinsCompetitionType::BASKETBALL_BBL,
                SporteinsCompetitionType::BASKETBALL_EUROLEAGUE,
                SporteinsCompetitionType::BASKETBALL_BBL_POKAL,
                SporteinsCompetitionType::BASKETBALL_CHAMPIONS_LEAGUE
            )
        };
    }

    public function jsonSerialize(): mixed{
        return $this->value;
    }
}
