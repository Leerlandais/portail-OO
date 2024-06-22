<?php

namespace model\Trait;

use Exception;


trait TraitTestString
{
    protected function verifyString (?string $testThis) {
        if ($testThis === "") {
            $errorMessage = "Please enter a valid string";
            return $errorMessage;
        }
        return true;
    }
}