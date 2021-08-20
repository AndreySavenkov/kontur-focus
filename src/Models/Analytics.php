<?php

namespace ASavenkov\KonturFocus\Models;

use ASavenkov\KonturFocus\DataTransferObject;

class Analytics extends DataTransferObject
{
    public string $inn;
    public string $ogrn;
    public string $focusHref;
    public bool $isMSP;
    public bool $isRNP;

    /**
     * @throws \Exception
     */
    public static function fromApiResponseItem(array $apiResponse): self
    {
        $isMicroCompany = isset($apiResponse['analytics']['m7023']) && $apiResponse['analytics']['m7023'];
        $isSmallCompany = isset($apiResponse['analytics']['m7024']) && $apiResponse['analytics']['m7024'];
        $isMediumCompany = isset($apiResponse['analytics']['m7025']) && $apiResponse['analytics']['m7025'];

        return new self([
            'inn' => $apiResponse['inn'],
            'ogrn' => $apiResponse['ogrn'],
            'focusHref' => $apiResponse['focusHref'],
            'isMSP' => $isMicroCompany || $isSmallCompany || $isMediumCompany,
            'isRNP' => isset($apiResponse['analytics']['m4001']) && $apiResponse['analytics']['m4001'],
        ]);
    }
}