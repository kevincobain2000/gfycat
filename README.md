#Gfycat API

PHP Interface to Gfycat, GET and SEARCH

## Install

```
composer require kevincobain2000/gfycat "^1.0"
composer update -vvv
```

## Setup


Get Your ClientId and ClientSecret from Gfycat developer console

## Usage


### Get

```
$gfycat = new Gfycat($this->clientId, $this->clientSecret);

$gfyid = 'heartfeltsorrowfulbushsqueaker';
$response = $gfycat->get($gfyid);
```

### Search

```
$gfycat = new Gfycat($this->clientId, $this->clientSecret);

$query = 'keywords';
$response = $gfycat->search($query);
```

## Tests

```
vendor/bin/phpunit
```