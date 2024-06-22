<?php

namespace model\Manager ;

use Exception;
use model\Interface\InterfaceManager;
use model\Mapping\DevlogMapping;
use model\OurPDO;

class DevlogManager implements InterfaceManager{
    
    private ?OurPDO $connect = null;
    
    public function __construct(OurPDO $db){
        $this->connect = $db;
    }
    
    public function selectAll(): ?array
    {
        $sql = "SELECT * 
                FROM `devlog`
                ORDER BY `dev_id` DESC";
        
        $select = $this->connect->query($sql);
        
        if($select->rowCount()===0) return null;
        
        $array = $select->fetchAll(OurPDO::FETCH_ASSOC);
        
        foreach($array as $value){
            $arrayLogs[] = new DevlogMapping($value);
        }
        return $arrayLogs;
    }
}