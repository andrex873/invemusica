<?php
namespace Album\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Album\Form\AlbumForm;
use Album\Model\Album;

class AlbumController extends AbstractActionController{
    
    protected $albumTable;

    public function indexAction() {
        return new ViewModel(array(
            'albums' => $this->getAlbumTable()->fetchAll()
        ));
    }
    
    public function addAction() {
        $form = new AlbumForm;
        $form->get('submit')->setValue("Agregar");
        
        if($this->getRequest()->isPost()){
            $post = $this->getRequest()->getPost();
            $album = new Album();
            $form->setInputFilter($album->getInputFilter());
            $form->setData($post);
            if($form->isValid()){
                $album->exchangeArray($form->getData());
                $this->getAlbumTable()->saveAlbum($album);
                return $this->redirect()->toRoute('album');
            }
        }
        return array(
            'form' => $form
        );
    }
    
    public function editAction() {
        
    }
    
    public function deleteAction() {
        
    }    
    
    /* -- Accesor methods -- */
    
    /**
     * Metodo accesor de la tabla AlbunTable.
     * 
     * @return \Album\Model\AlbumTable
     */
    public function getAlbumTable() {
        if(!$this->albumTable){
            $sm = $this->getServiceLocator();
            $this->albumTable = $sm->get("Album\Model\AlbumTable");            
        }
        return $this->albumTable;
    }
}