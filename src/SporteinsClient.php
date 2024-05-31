<?php

namespace developermarius\sporteins\publicapi;

use developermarius\sporteins\publicapi\models\SporteinsCompetitionType;
use developermarius\sporteins\publicapi\models\SporteinsGameplanElementType;
use developermarius\sporteins\publicapi\models\SporteinsGameplanElement;
use developermarius\sporteins\publicapi\models\SporteinsGameplansResponse;
use developermarius\sporteins\publicapi\models\SporteinsMatchesResponse;
use developermarius\sporteins\publicapi\models\SporteinsSportIdentifier;
use developermarius\sporteins\publicapi\models\SporteinsSeasonsResponse;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Psr\Http\Message\RequestInterface;

class SporteinsClient{

    private ?Client $http_client = null;
    private static array $user_agents = array(
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.3729.169 Safari/537.36',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36',
        'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36'
    );

    private function getHttpClient(): Client{
        if($this->http_client === null){
            $stack = new HandlerStack();
            $stack->setHandler(new CurlHandler());
            $stack->push(Middleware::mapRequest(function(RequestInterface $request) {
                $request = $request->withHeader('User-Agent', SporteinsClient::$user_agents[array_rand(SporteinsClient::$user_agents)]);
                return $request;
            }));
            $this->http_client = new Client(array(
                'headers' => array(
                    'Referer' => 'https://www.sport1.de/'
                ),
                'base_uri' => 'https://api.sport1.info',
                'handler' => $stack
            ));
        }
        return $this->http_client;
    }

    public function getSeasons(SporteinsSportIdentifier $sport, SporteinsCompetitionType $competition): SporteinsSeasonsResponse{
        //https://api.sport1.info/v2/de/soccer/competition/opta_22/season
        $response = $this->getHttpClient()->request('GET', '/v2/de/' . strtolower($sport->name) . '/competition/' . $competition->value . '/season');
        return new SporteinsSeasonsResponse(json_decode($response->getBody(), true));
    }

    public function getGamePlans(SporteinsSportIdentifier $sport, SporteinsCompetitionType $competition, string $season): SporteinsGameplansResponse{
        //https://api.sport1.info/v2/de/soccer/competition/opta_87/season/opta_2023/competitionGameplan
        $response = $this->getHttpClient()->request('GET', '/v2/de/' . strtolower($sport->name) . '/competition/' . $competition->value . '/season/' . $season . '/competitionGameplan');
        return new SporteinsGameplansResponse(json_decode($response->getBody(), true));
    }

    public function getMatches(SporteinsSportIdentifier $sport, SporteinsCompetitionType $competition, string $season, SporteinsGameplanElement $game_plan){
        $url = '/v2/de/' . strtolower($sport->name) . '/competition/' . $competition->value . '/season/' . $season;
        switch($game_plan->getType()){
            case SporteinsGameplanElementType::LEAGUE:
                ///round/31/gameplan/competitionMatches/phase/PHASE_REGULAR_SEASON
                $url .= '/round/' . $game_plan->getRoundNumber() . '/gameplan/competitionMatches/phase/' . $game_plan->getPhase()->getName()->name;
                break;
            case SporteinsGameplanElementType::CUP:
                ///roundType/SEMI_FINALS/gameplan/playoffMatches/playDown/false
                $url .= '/roundType/' . $game_plan->getRoundType()->name . '/gameplan';
                if($game_plan->isPlayoff()){
                    $url .= '/playoffMatches/playDown/' . ($game_plan->isPlayDown() ? 'true' : 'false');
                }else{
                    $url .= '/competitionMatches';
                }
                break;
            default:
                ///matchDay/34/gameplan/competitionMatches
                $url .= '/matchDay/' . $game_plan->getMatchDay() . '/gameplan/competitionMatches';
                break;
        }

        $response = $this->getHttpClient()->request('GET', $url);
        $data = json_decode($response->getBody(), true);
        return new SporteinsMatchesResponse($data);
    }

    public function getMatch(SporteinsSportIdentifier $sport, string $match){
        //https://api.sport1.info/v2/de/handball/match/sr:match:42307993
        if($sport === SporteinsSportIdentifier::SOCCER){
            $response = $this->getHttpClient()->request('GET', '/v2/de/' . strtolower($sport->name) . '/ticker/' . $match);
            return json_decode($response->getBody(), true);
        }else{
            $response = $this->getHttpClient()->request('GET', '/v2/de/' . strtolower($sport->name) . '/match/' . $match);
            return json_decode($response->getBody(), true)['gameplan'];
        }
    }

    public function getMatchInfoUrl(SporteinsSportIdentifier $sport, SporteinsCompetitionType $competition, string $match): string{
        return 'https://www.sport1.de/daten/' . $sport->getSlug() . '/' . $competition->getSlug() . '/live-ticker/' . $match . '/uebersicht';
    }
}