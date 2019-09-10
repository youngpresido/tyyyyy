<?php

return [
	 /*
     * Set configuration for flexcode
     */

    'devices' => array(
        // add device here
        array(
            'name' 	=> env('FLEXCODE_DEVICE',"mydevice"),
            'sn' 	=> env('FLEXCODE_SN',"AZ00T069431"),
            'vc'	=> env('FLEXCODE_VC',"C10541FAAB7D615"),
            'ac' 	=> env('FLEXCODE_AC',"ARBB08A8548BC28F9DD18YHJ"),
            'vkey' 	=> env('FLEXCODE_VKEY',"8CD068380E2EF823BE718FB2C38916AF"),
        ),
    ),
];