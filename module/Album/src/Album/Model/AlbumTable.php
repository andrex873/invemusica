<?php

namespace Album\Model;

use Zend\Db\TableGateway\TableGateway,
    Zend\Db\Adapter\Adapter,
    Zend\Db\ResultSet\ResultSet;

class AlbunTable extends TableGateway{
    
    public function __construct(Adapter $adapter = null, $databaseSchema = null, ResultSet $selectResultPrototype = null) {
        return parent::__construct('album', $adapter, $databaseSchema, $selectResultPrototype);
    }
}