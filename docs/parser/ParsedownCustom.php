<?php

class ParsedownCustom extends ParsedownExtra
{
    public $navigate = [];

    protected function identifyAtx($Line)
    {
        $Block = parent::identifyAtx($Line);

        // $Block['element']['id']

        return $Block;
    }
}
