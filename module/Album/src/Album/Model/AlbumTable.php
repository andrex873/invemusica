<?php

namespace Album\Model;

use Zend\Db\TableGateway\TableGateway;

class AlbumTable extends TableGateway{
    
    
    protected $tableGateway;


    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }
    
    public function fetchAll(){
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }
    
    public function getAlbum($id) {
        $id = (int)$id;        
        $resultSet = $this->tableGateway->select(array('id' => $id));
        $row = $resultSet->current();
        if(empty($row)){
            throw new \Exception("No se encontro el album con id {$id} ");
        }
        return $row;
    }
    
    public function saveAlbum(Album $album) {
        $data = array(
            'artist' => $album->artist,
            'title' => $album->title
        );
        $id = (int) $album->id;
        if($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if($this->getAlbum($id)){
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new Exception("El album no existe");
            }
        }
    }

    public function deleteAlbum($id) {
        $this->tableGateway->delete(array('id' => (int)$id));
    }
}