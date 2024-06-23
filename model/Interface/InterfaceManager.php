<?php
// JE ME DEMANDE SI UN INTERFACE EST VRAIMENT NECESSAIRE POUR UN PROJET SOLO
namespace model\Interface;


use model\OurPDO;
use Exception;


interface InterfaceManager
{
    public function __construct(OurPDO $pdo);
    public function selectAll();
    public function changeVisibilityofLog(OurPDO $pdo, string $act, int $id) : bool|string;
    // public function getOneLog(OurPDO $db, int $id) : array|bool|string;
    public function deleteLogByID(OurPDO $db, int $id) : bool | string;

}