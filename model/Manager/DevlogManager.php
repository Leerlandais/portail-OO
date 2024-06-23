<?php

namespace model\Manager ;

use Exception;
use model\Interface\InterfaceManager;
use model\Mapping\DevlogMapping;
use model\OurPDO;
// use PDO;

class DevlogManager implements InterfaceManager{
    
    private ?OurPDO $connect = null;
    
    public function __construct(OurPDO $db){
        $this->connect = $db;
    }
    

    // RECUPERATION DE TOUTES LOGS POUR AFFICHAGE
    public function selectAll(): ?array
    {
        $sql = "SELECT * 
                FROM `devlog`
            --  WHERE `dev_id` > 500 -- Test to see if it works with no logs
                ORDER BY `dev_id` DESC";
        
        $select = $this->connect->query($sql);
        
        if($select->rowCount()===0) return null;
        
        $array = $select->fetchAll(OurPDO::FETCH_ASSOC);
        
        foreach($array as $value){
            $arrayLogs[] = new DevlogMapping($value);
        }
        return $arrayLogs;
    }

    // CHANGEMENT DU VISIBILITE D'UN LOG
    public function  changeVisibilityofLog(OurPDO $pdo, string $act, int $id) : bool|string {
        $act == "Hide" ? $act = 0 : $act = 1;

        $sql = "UPDATE `devlog`
                SET    `dev_visible` = ?
                WHERE  `dev_id` = ?";
        $stmt = $pdo->prepare($sql);

        try{
            $stmt->bindValue(1, $act, OurPDO::PARAM_INT);
            $stmt->bindValue(2, $id, OurPDO::PARAM_INT);

            $stmt->execute();
            if($stmt->rowCount() === 0) return false;
            return true;
        }catch(Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    // RECUPERATION D'UN LOG POUR SUPPRESSION OU MISE À JOUR
    public function getOneLog(OurPDO $db, int $id): DevlogMapping|bool|string {
        $sql = "SELECT *
                FROM `devlog`
                WHERE `dev_id` = ?";
        $stmt = $db->prepare($sql);
    
        try {
            $stmt->execute([$id]);
            if ($stmt->rowCount() === 0) return false;
            $result = $stmt->fetch(OurPDO::FETCH_ASSOC);
            $oneLog = new DevlogMapping($result);
            return $oneLog;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    // SUPPRESSION D'UN LOG
    public function deleteLogByID(OurPDO $db, int $id) : bool | string {
        $sql = "DELETE FROM `devlog`
                WHERE `dev_id` = :id";
        $stmt = $db->prepare($sql);

        try{
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            if ($stmt->rowCount() === 0) return false;
            return true;
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }

    // MISE À JOUR D'UN LOG
    public function updateOneLog(OurPDO $db, int $id, string $date, string $text) : bool|string {
        $sql = "UPDATE `devlog` 
                SET    `dev_date`= ?,
                       `dev_log`= ? 
                WHERE  `dev_id` = ?";
        $stmt = $db->prepare($sql);

        try{
            $stmt->bindValue(1, $date);
            $stmt->bindValue(2, $text);
            $stmt->bindValue(3, $id);
            $stmt->execute();
            if ($stmt->rowCount() === 0) return false;
            return true;
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }

    // AJOUTE D'UN NOUVEAU LOG
    public function addNewLog(OurPDO $db, string $date, string $text) : bool|string {
        $sql = "INSERT INTO `devlog`
                            (`dev_date`, `dev_log`) 
                     VALUES (? , ?)";
        $stmt = $db->prepare($sql);

        try{
            $stmt->execute([$date,
                            $text]);
                if ($stmt->rowCount() === 0) return false;
                return true;
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }


}