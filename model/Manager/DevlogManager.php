<?php

namespace model\Manager ;

use Exception;
use model\Interface\InterfaceManager;
use model\Mapping\DevlogMapping;
use model\OurPDO;
use PDO;

class DevlogManager implements InterfaceManager{
    
    private ?OurPDO $connect = null;
    
    public function __construct(OurPDO $db){
        $this->connect = $db;
    }
    
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

    public function  changeVisibilityofLog(OurPDO $pdo, string $act, int $id) : bool|string {
        $act == "Hide" ? $act = 0 : $act = 1;

        $sql = "UPDATE `devlog`
                SET    `dev_visible` = ?
                WHERE  `dev_id` = ?";
        $stmt = $pdo->prepare($sql);

        try{
            $stmt->bindValue(1, $act, PDO::PARAM_INT);
            $stmt->bindValue(2, $id, PDO::PARAM_INT);

            $stmt->execute();
            if($stmt->rowCount() === 0) return false;
            return true;
        }catch(Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    public function getOneLog(OurPDO $db, int $id) : array|bool|string {
        $sql = "SELECT *
                FROM `devlog`
                WHERE `dev_id` = ?";
        $stmt = $db->prepare($sql);

        try {
            $stmt->execute([$id]);
            if ($stmt->rowCount() === 0) return false;
            $result = $stmt->fetch(OurPDO::FETCH_ASSOC);
            return $result; 
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

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






}