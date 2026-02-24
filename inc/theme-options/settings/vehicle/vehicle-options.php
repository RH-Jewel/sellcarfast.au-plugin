<?php
/*-------------------------------------------------------
		   ** Vehicle options
	--------------------------------------------------------*/
CSF::createSection($prefix, array(
    'id'     => 'vehicle_options',
    'title'  => esc_html__('Vehicle Settings', 'drivco-core'),
    'icon'   => 'fas fa-truck',
));
/*-----------------------------------
		REQUIRE Header FILES
	------------------------------------*/

require_once EGNS_CORE_INC . '/theme-options/settings/vehicle/vehicle-archive.php';
require_once EGNS_CORE_INC . '/theme-options/settings/vehicle/vehicle-details.php';
