<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;

class PortalsMapping extends AbstractMapping
{
    protected ?int $port_id;
    protected ?string $port_title;
    protected ?string $port_description;
    protected ?string $port_img_scr;
    protected ?int $port_img_width;
    protected ?string $port_img_width_type;
    protected ?int $port_img_height;
    protected ?string $port_img_height_type;
    protected ?string $port_dest_url;
    protected ?int $port_visible;
    protected ?int $port_placement;


    // LES GETTERS - SETTERS PAS UTILISER CE FOIS
    public function getPortId() : ?int {
        return $this->port_id;
    }
    public function getPortTitle() : ?string {
        return $this->port_title;
    }
    public function getPortDescription() : ?string {
        return $this->port_description;
    }
    public function getPortImgSrc() : ?string {
        return $this->port_img_scr;
    }
    public function getPortImgWidth() : ?int {
        return $this->port_img_width;
    }
    public function getPortImgWidthType() : ?string {
        return $this->port_img_width_type;
    }
    public function getPortImgHeight() : ?int {
        return $this->port_img_height;
    }
    public function getPortImgHeightType() : ?string {
        return $this->port_img_height_type;
    }
    public function getPortDestUrl() : ?string {
        return $this->port_dest_url;
    }
    public function getPortVisible() : ?int {
        return $this->port_visible;
    }
    public function getPortPlacement() : ?int {
        return $this->port_placement;
    }
}