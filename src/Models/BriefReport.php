<?php

namespace ASavenkov\KonturFocus\Models;

class BriefReport
{
    /**
     * @var string
     */
    public $inn;
    /**
     * @var string
     */
    public $ogrn;
    /**
     * @var string
     */
    public $focusHref;
    /**
     * @var string
     */
    public $href;
    /**
     * @var bool
     */
    public $greenStatements;
    /**
     * @var bool
     */
    public $yellowStatements;
    /**
     * @var bool
     */
    public $redStatements;

    /**
     * @return string
     */
    public function getInn(): string
    {
        return $this->inn;
    }

    /**
     * @param string $inn
     */
    public function setInn(string $inn): void
    {
        $this->inn = $inn;
    }

    /**
     * @return string
     */
    public function getOgrn(): string
    {
        return $this->ogrn;
    }

    /**
     * @param string $ogrn
     */
    public function setOgrn(string $ogrn): void
    {
        $this->ogrn = $ogrn;
    }

    /**
     * @return string
     */
    public function getFocusHref(): string
    {
        return $this->focusHref;
    }

    /**
     * @param string $focusHref
     */
    public function setFocusHref(string $focusHref): void
    {
        $this->focusHref = $focusHref;
    }

    /**
     * @return string
     */
    public function getHref(): string
    {
        return $this->href;
    }

    /**
     * @param string $href
     */
    public function setHref(string $href): void
    {
        $this->href = $href;
    }

    /**
     * @return bool
     */
    public function isGreenStatements(): bool
    {
        return $this->greenStatements;
    }

    /**
     * @param bool $greenStatements
     */
    public function setGreenStatements(bool $greenStatements): void
    {
        $this->greenStatements = $greenStatements;
    }

    /**
     * @return bool
     */
    public function isYellowStatements(): bool
    {
        return $this->yellowStatements;
    }

    /**
     * @param bool $yellowStatements
     */
    public function setYellowStatements(bool $yellowStatements): void
    {
        $this->yellowStatements = $yellowStatements;
    }

    /**
     * @return bool
     */
    public function isRedStatements(): bool
    {
        return $this->redStatements;
    }

    /**
     * @param bool $redStatements
     */
    public function setRedStatements(bool $redStatements): void
    {
        $this->redStatements = $redStatements;
    }

}