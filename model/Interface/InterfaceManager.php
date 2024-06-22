<?php

namespace model\Interface;


use model\OurPDO;
use Exception;


interface InterfaceManager
{
    public function __construct(OurPDO $pdo);
    public function selectAll();

}