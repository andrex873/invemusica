<?php
namespace Album\Form;

use Zend\Form\Form;
/**
 * Description of AlbumForm
 *
 * @author xubuntu
 */
class AlbumForm extends Form {
    public function __construct($name = null) {
        parent::__construct('album');
        $this->setAttribute('method', "post");
        
        $this->add(array(
            'name' => "id",
            'type' => "Hidden",
        ));
        
        $this->add(array(
            'name' => "title",
            'type' => "Text",
            'options' => array(
                'label' => "Titulo"
            ),
            'attributes' => array(
                'class' => ""
            )
        ));
        
        $this->add(array(
            'name' => "artist",
            'type' => "Text",
            'options' => array(
                'label' => "Artista"
            ),
            'attributes' => array(
                'class' => ""
            )
        ));
        
        $this->add(array(
            'name' => "submit",
            'type' => "Submit",
            'attributes' => array(
                'value' => "Enviar",
                'id' => "botonEnviar",
                'class' => "btn"
            ),
        ));
        
    }
}
