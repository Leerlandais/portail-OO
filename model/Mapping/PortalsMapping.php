<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;
use model\Trait\TraitTestInt;
use model\Trait\TraitTestString;

class PortalsMapping extends AbstractMapping
{

    use TraitTestInt;
    use TraitTestString;

    protected ?int $port_id;
    protected ?string $port_title;
    protected ?string $port_description;
    protected ?string $port_img_src;
    protected ?int $port_img_width;
    protected ?string $port_img_width_type;
    protected ?int $port_img_height;
    protected ?string $port_img_height_type;
    protected ?string $port_dest_url;
    protected ?int $port_visible;
    protected ?int $port_placement;


    // LES GETTERS 
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
        return $this->port_img_src;
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

    // LES SETTERS
    public function setPortId(?int $port_id) : void {
        if (is_string($this->verifyInt($port_id, 0))){
            echo $this->verifyInt($port_id, 0);
        }
        $this->port_id = $port_id;
    }
    public function setPortTitle(?string $port_title) : void {
        if (is_string($this->verifyString($port_title))) {
            echo $this->verifyString($port_title);
        }
            $this->port_title = $port_title;
        }
    public function setPortDescription(?string $port_description) : void {
        if (is_string($this->verifyString($port_description))) {
            echo $this->verifyString($port_description);
        }
        $this->port_description = $port_description;
    }
    public function setPortImgSrc(?string $port_img_src) : void {
        if (is_string($this->verifyString($port_img_src))) {
            echo $this->verifyString($port_img_src);
        }
        $this->port_img_src = $port_img_src;
    }
    public function setPortImgWidth(?int $port_img_width) : void {
        if (is_string($this->verifyInt($port_img_width, 0))){
            echo $this->verifyInt($port_img_width, 0);
        }
        $this->port_img_width = $port_img_width;
    }
    
    
    
    
    } // end of class