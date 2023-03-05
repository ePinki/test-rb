<?php
namespace App;

class Client {

    protected $instance;

    public function __construct() {
        $params = array( 'uri' => '/soap/server',
                         'location' => url('/soap/server'),
                         'trace' => 1,
                         'soap_version' => SOAP_1_2
                         );

      $this->instance = new \SoapClient(null, $params);

    }

    public function create($new) {
        return $this->instance->__soapCall('create', $new);
    }
    public function update($old) {
        return $this->instance->__soapCall('update', $old);
    }

}
