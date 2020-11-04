<?php

namespace ASavenkov\KonturFocus;

use GuzzleHttp\Exception\GuzzleException;
use ASavenkov\KonturFocus\Models\BriefReport;
use ASavenkov\KonturFocus\Models\BriefReportSummary;

class Client {
    const BASE_URL = 'https://focus-api.kontur.ru';
    /**
     * @var string
     */
    private $apiKey;

    /**
     * Конструктор
     * @param string $apiKey Ключ доступа к API Контур.Фокус
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @param string $inn
     * @param string|null $ogrn
     * @return BriefReport|null
     * @throws GuzzleException
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
            $responseArray = json_decode($responseBody, true);
            if (count($responseArray) > 0) {
                $responseItem = current($responseArray);
                $responseBriefReport = $responseItem['briefReport'];
                $responseBriefReportSummary = $responseBriefReport['summary'];
                $briefReportObject = new BriefReport();
                $briefReportObject->setInn($responseItem['inn']);
                $briefReportObject->setOgrn($responseItem['ogrn']);
                $briefReportObject->setFocusHref($responseItem['focusHref']);
                $briefReportObject->setHref($responseBriefReport['href']);
                $briefReportObject->setGreenStatements(isset($responseBriefReportSummary['greenStatements']) && $responseBriefReportSummary['greenStatements']);
                $briefReportObject->setRedStatements(isset($responseBriefReportSummary['redStatements']) && $responseBriefReportSummary['redStatements']);
                $briefReportObject->setYellowStatements(isset($responseBriefReportSummary['yellowStatements']) && $responseBriefReportSummary['yellowStatements']);
                return $briefReportObject;
            }
        }
        return null;
    }
}