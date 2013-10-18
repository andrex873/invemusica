<?php
namespace Album\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AlbumController extends AbstractActionController{
    
    //protected $albumTable;

    public function indexAction() {
        return new ViewModel(array(
            'texto' => "este es el texto",
            'numero' => 15
        ));
    }
    
    public function addAction() {
        
    }
    
    public function editAction() {
        
    }
    
    public function deleteAction() {
        
    }    
    
    /* -- Accesor methods -- */
//    public function getAlbumTable() {
//        if(!$this->albumTable){
//            $sm = $this->getServiceLocator();
//            $this->albumTable = $sm->get("Album\Model\AlbumTable");            
//        }
//        return $this->albumTable;
//    }
}