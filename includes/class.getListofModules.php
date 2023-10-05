<?php

class GetListOfModules {

    public function execute() {
        $getListOfModules = array(
            'modules' => array(
                'key1' => array(
                    'creatable' => 1,
                    'deletable' => 1,
                    'api_name' => 'lead',
                ),
                'key2' => array(
                    'creatable' => 1,
                    'deletable' => 1,
                    'api_name' => 'lead',
                ),
            )
        );

        return $getListOfModules;
    }
}
