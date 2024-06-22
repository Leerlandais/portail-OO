<?php

namespace model\Interface;


use model\OurPDO;
use Exception;


interface InterfaceManager
{
    public function __construct(OurPDO $pdo);
    public function selectAll();
    public function changeVisibilityofLog(OurPDO $pdo, string $act, int $id) : bool|string;

}