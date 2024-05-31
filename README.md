# Sport1 Public Api

This is a simple wrapper for the Sport1 Public Api. It is written in PHP and provides a simple way to access the Sport1 Public Api.  
The Sport1 Public Api is a RESTful API that provides access to the Sport1 data like game information.  
After I did some simple analysis on the Sport1 Public Api, I documented some components of the API in a gist. You can find the gist [here](https://gist.github.com/DeveloperMarius/9e117e254b49bc131cae98c9099734c6).

## Installation

To install this library, you need to have Composer installed on your system. If you don't have it installed, you can download it from [here](https://getcomposer.org/).

Once you have Composer installed, you can install the library by running the following command in your terminal:

```bash
composer require developermarius/sporteins-public-api
```

## Usage

### Initialization

First, you need to import the `SporteinsClient` class and create a new instance of it.

```php
use developermarius\sporteins\publicapi\SporteinsClient;

$client = new SporteinsClient();
```

### Listing Seasons

To search for products, you can use the `search` method. This method accepts an optional `EventimSearchQuery` object. If no query object is provided, a default one will be used.

```php
use developermarius\eventim\publicapi\models\EventimSearchQuery;
use developermarius\sporteins\publicapi\models\SporteinsSportIdentifier;
use developermarius\sporteins\publicapi\models\SporteinsCompetitionType;

$seasons_response = $client->getSeasons(SporteinsSportIdentifier::SOCCER, SporteinsCompetitionType::SOCCER_FIRST_BUNDESLIGA);
```

The `getSeasons` method returns an `SporteinsSeasonsResponse` object, which contains all seasons for the competition for the given sport.

### List Game plans

To list game plans for a specific season, you can use the `getGamePlans` method. This method accepts the sport identifier, competition type, and season id.

```php
$game_plans_response = $client->getGamePlans(SporteinsSportIdentifier::SOCCER, SporteinsCompetitionType::SOCCER_FIRST_BUNDESLIGA, $seasons_response->getSeasons()[0]->getId());
```

The `getGamePlans` method returns an `SporteinsGameplansResponse` object, which contains all game plans for the given season.

### List Matches for a specific game plan

To list matches for a specific game plan, you can use the `getMatches` method. This method accepts the sport identifier, competition type, season id, and game plan object.

```php
$matches_response = $client->getMatches(SporteinsSportIdentifier::SOCCER, SporteinsCompetitionType::SOCCER_FIRST_BUNDESLIGA, $seasons_response->getSeasons()[0]->getId(), $game_plans_response->getGameplan()[0]);
```

The `getMatches` method returns an `SporteinsMatchesResponse` object, which contains all matches for the given game plan.

### Get Match Details
Warning: This function is very unstable because not every game has and endpoint detailed information and the endpoints in general differ from sport to sport and from competition to competition.

To get details for a specific match, you can use the `getMatch` method. This method accepts the sport identifier and the match id.

```php
$match_details_response = $client->getMatch(SporteinsSportIdentifier::SOCCER, $matches->getMatches()[0]->getId());
```

The `getMatch` method returns an `SporteinsMatch` or `SporteinsTickerResponse` object, which contains all details for the given match.

## TODO

- [ ] Add more sports and competitions
- [ ] Add more match details / live ticker endpoints
- [ ] Add more endpoints in general :)

## Contributing

Contributions are welcome! Please feel free to submit a pull request.

## License

This library is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).