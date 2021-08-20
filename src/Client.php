<?php

namespace ASavenkov\KonturFocus;

use ASavenkov\KonturFocus\Models\Analytics;
use GuzzleHttp\Exception\GuzzleException;
use ASavenkov\KonturFocus\Models\BriefReport;

class Client {
    public const BASE_URL = 'https://focus-api.kontur.ru';
    /**
     * @var string
     */
    private string $apiKey;

    /**
     * Конструктор
     * @param string $apiKey Ключ доступа к API Контур.Фокус
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @param  string  $inn
     * @param  string|null  $ogrn
     * @return BriefReport|null
     * @throws GuzzleException
     * @throws \JsonException
     */
    public function getBriefReport(string $inn, string $ogrn = null)
    {
        $methodUrl = '/api3/briefReport';
        $requestUrl = $methodUrl . '?key=' . $this->apiKey;
        $requestUrl .= '&inn=' . $inn;
        if (!empty($ogrn)) {
            $requestUrl .= '&ogrn=' . $ogrn;
        }

        $client = new \GuzzleHttp\Client(['base_uri' => self::BASE_URL]);
        $response = $client->get($requestUrl);
        $responseStatus = $response->getStatusCode();
        if ($responseStatus === 200) {
            $responseBody = (string) $response->getBody();
            $responseArray = json_decode($responseBody, true, 512, JSON_THROW_ON_ERROR);
            if (count($responseArray) > 0) {
                $responseItem = current($responseArray);
                return BriefReport::fromApiResponseItem($responseItem);
            }
        }
        return null;
    }

    /**
     * @param  string  $inn
     * @param  string|null  $ogrn
     * @return Analytics|null
     * @throws GuzzleException
     * @throws \JsonException
     * @throws \Exception
     */

    public function getAnalytics(string $inn, string $ogrn = null)
    {
        $methodUrl = '/api3/analytics';
        $requestUrl = $methodUrl . '?key=' . $this->apiKey;
        $requestUrl .= '&inn=' . $inn;
        if (!empty($ogrn)) {
            $requestUrl .= '&ogrn=' . $ogrn;
        }

        $client = new \GuzzleHttp\Client(['base_uri' => self::BASE_URL]);
        $response = $client->get($requestUrl);
        $responseStatus = $response->getStatusCode();
        if ($responseStatus === 200) {
            $responseBody = (string) $response->getBody();
            $responseArray = json_decode($responseBody, true, 512, JSON_THROW_ON_ERROR);
            if (count($responseArray) > 0) {
                $responseItem = current($responseArray);
                return Analytics::fromApiResponseItem($responseItem);
            }
        }
        return null;
    }
}