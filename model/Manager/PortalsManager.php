<?php

namespace model\Manager;

use Exception;
use model\Mapping\PortalsMapping;
use model\OurPDO;

class PortalsManager
{
    private ?OurPDO $connect = null;
    
    public function __construct(OurPDO $db){
        $this->connect = $db;
    }

    public function selectAllPortals() : array|string {
        $sql = "SELECT *
                FROM `portals`
                ORDER BY `port_id`
                ASC";

        $query = $this->connect->query($sql);
        if ($query->rowCount() === 0) return "There are no Portals";
        $portArray = $query->fetchAll(OurPDO::FETCH_ASSOC); // FAUT QUE JE TROUVE COMMENT METTRE FETCH_ASSOC COMME DEFAUT AVEC OOP

        foreach($portArray as $port) {
            $arrayPorts[] = new PortalsMapping($port);
        }
        return $arrayPorts;
    }
}