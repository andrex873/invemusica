<?php
namespace Album\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
/**
 * Description of Album
 *
 * @author amendez
 */
class Album implements InputFilterAwareInterface{
    public $id;
    public $artist;
    public $title;
    
    protected $inputFilter;


    public function exchangeArray($data){
        $this->id = (!empty($data['id']))? $data['id']: null;
        $this->artist = (!empty($data['artist']))? $data['artist']: null;
        $this->title = (!empty($data['title']))? $data['title']: null;
    }
    
    /* -- Accesor methods -- */
    
    /**
     * 
     * @param \Zend\InputFilter\InputFilterInterface $inputFilter
     * @throws Exception
     */
    public function setInputFilter(InputFilterInterface $inputFilter) {
        throw new Exception("No se usa este metodo");
    }
    
    /**
     * 
     * @return type
     */
    public function getInputFilter(){
        if(!$this->inputFilter){
            $inputFilter = new InputFilter();
            $factory = new InputFactory();
            
            $inputFilter->add($factory->createInput(array(
                'name' => "id",
                'required' => true,
                'filters' => array(
                    array('name' => "Int")
                ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name' => "artist",
                'required' => true,
                'filters' => array(
                    array('name' => "StripTags"),
                    array('name' => "StringTrim"),
                ),
                'validators' => array(
                    array(
                        'name' => "StringLength",
                        'options' => array(
                            'encoding' => "UTF-8",
                            'min' => 1,
                            'max' => 100,
                        ),
                    )
                )
            )));
            $inputFilter->add($factory->createInput(array(
                'name' => "title",
                'required' => true,
                'filters' => array(
                    array('name' => "StripTags"),
                    array('name' => "StringTrim"),
                ),
                'validators' => array(
                    array(
                        'name' => "StringLength",
                        'options' => array(
                            'encoding' => "UTF-8",
                            'min' => 1,
                            'max' => 100,
                        ),
                    )
                )
            )));
            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }
    
}
