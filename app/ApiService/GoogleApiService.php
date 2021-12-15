<?php


namespace App\ApiService;


use GuzzleHttp\Client;

class GoogleApiService
{
    private Client $client;
    private string $key;

    public function __construct(Client $client)
    {
        $googleApiKey = config('google.api_key');

        if (!$googleApiKey) {
            throw new \DomainException('Please setup google api key');
        }

        $this->key = $googleApiKey;
        $this->client = $client;
    }

    public function autocompleteCity(string $query)
    {
        $url = "https://maps.googleapis.com/maps/api/place/autocomplete/json?";
        $url .= "input={$query}";
        $url .= "&types=(cities)";
        $url .= "&components=country:us";
        $url .= "&key={$this->key}";

        $response = $this
            ->client
            ->request('GET', $url);

        return json_decode($response->getBody(), true);
    }

    public function autocompleteZip(string $query)
    {
        $url = "https://maps.googleapis.com/maps/api/place/autocomplete/json?";
        $url .= "input={$query}";
        $url .= "&types=(regions)";
        $url .= "&components=country:us";
        $url .= "&key={$this->key}";

        $response = $this
            ->client
            ->request('GET', $url);

        return json_decode($response->getBody(), true);
    }

    public function geocodeByPlaceId(string $placeId): array
    {
        $place = $this->searchByPlaceId($placeId);
        if (!isset($place["result"])) {
            return [];
        }
        $coords = $place["result"]["geometry"]["location"];
        return $this->reverseGeocode($coords);
    }

    public function searchByPlaceId(string $placeId): array
    {
        $url = "https://maps.googleapis.com/maps/api/place/details/json?";
        $url .= "placeid={$placeId}";
        $url .= "&key={$this->key}";

        $response = $this
            ->client
            ->request('GET', $url);

        return json_decode($response->getBody(), true);
    }

    public function reverseGeocode(array $latlng): array
    {
        $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng={$latlng['lat']},{$latlng['lng']}&key={$this->key}";

        $response = $this
            ->client
            ->request('GET', $url);

        return json_decode($response->getBody(), true);
    }

    public function getCoordinatesByAddress(string $address): ?array
    {
        $results = $this->searchByCity($address);
        if (isset($results["results"][0])) {
            $result = $results["results"][0];
            if (isset($result["geometry"]["location"])) {
                return $result["geometry"]["location"];
            }
        }

        return null;
    }

    public function searchByCity(string $query): array
    {
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$query}&components=country:US|postal_code&key={$this->key}";

        $response = $this
            ->client
            ->request('GET', $url);

        return json_decode($response->getBody(), true);
    }

    public function searchByZip(string $zip): array
    {
        $url = "https://maps.googleapis.com/maps/api/geocode/json?components=country:US|postal_code:{$zip}&key={$this->key}";

        $response = $this
            ->client
            ->request('GET', $url);

        return json_decode($response->getBody(), true);
    }

    public function distanceBetweenTwoPoints(string $originZip, string $destinationZip): float
    {
        $originCoords = null;
        $originSearch = $this->searchByZip($originZip);

        if (isset($originSearch['results'][0]["geometry"]["location"])) {
            $originCoords = $originSearch['results'][0]["geometry"]["location"];
        }

        $destinationCoords = null;
        $destinationSearch = $this->searchByZip($destinationZip);


        if (isset($destinationSearch['results'][0]["geometry"]["location"])) {
            $destinationCoords = $destinationSearch['results'][0]["geometry"]["location"];
        }

        if (!$originCoords || !$destinationCoords) {
            throw new \DomainException('Zip cannot be geocoded');
        }

        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?";
        $url .= "origins={$originCoords['lat']},{$originCoords['lng']}";
        $url .= "&destinations={$destinationCoords['lat']},{$destinationCoords['lng']}";
        $url .= "&key={$this->key}";

        $response = $this
            ->client
            ->request('GET', $url);

        $decoded = json_decode($response->getBody(), true);

        if (!isset($decoded["rows"][0]["elements"][0]["distance"]["value"])) {
            throw new \DomainException('Zip cannot be geocoded. Error in Distance Request');
        }

        // return $km * 0.621371;
        $meters = $decoded["rows"][0]["elements"][0]["distance"]["value"];
        return $meters * 0.000621371;
    }
}
