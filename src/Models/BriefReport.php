<?php

namespace ASavenkov\KonturFocus\Models;

use ASavenkov\KonturFocus\DataTransferObject;

class BriefReport extends DataTransferObject
{
    public string $inn;
    public string $ogrn;
    public string $focusHref;
    public string $href;
    public bool $greenStatements;
    public bool $yellowStatements;
    public bool $redStatements;

    public static function fromApiResponseItem(array $apiResponse): self
    {
        return new self([
            'inn' => $apiResponse['inn'],
            'ogrn' => $apiResponse['ogrn'],
            'focusHref' => $apiResponse['focusHref'],
            'href' => $apiResponse['briefReport']['href'],
            'greenStatements' => isset($apiResponse['briefReport']['summary']['greenStatements']) && $apiResponse['briefReport']['summary']['greenStatements'],
            'yellowStatements' => isset($apiResponse['briefReport']['summary']['yellowStatements']) && $apiResponse['briefReport']['summary']['yellowStatements'],
            'redStatements' => isset($apiResponse['briefReport']['summary']['redStatements']) && $apiResponse['briefReport']['summary']['redStatements'],
        ]);
    }
}