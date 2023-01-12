<?php
/*
Plugin Name: KCJ Infonet Cache
Text Domain: KCJ-Infonet-Cache
Description: KCJ Infonet Cache is a cache plugin developed by KCJ Infonet OPC Private Limtied to help speed up WordPress Websites by providing Cache Solutions.
Author: KCJ Infonet OPC Private Limited
Author URI: https://kcjinfonet.com
License: GPL2+
Version: 1.0
*/

/*
Copyright (C)  2022 KCJ Infonet OPC Private Kimited
Copyright (C)  2016 keycdn
Copyright (C)  2011-2015 Sergej Müller

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License along
with this program; if not, write to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
*/


// exit
defined('ABSPATH') OR exit;


// constants
define('DCH_FILE', __FILE__);
define('DCH_DIR', dirname(__FILE__));
define('DCH_BASE', plugin_basename(__FILE__));
define('DCH_CACHE_DIR', WP_CONTENT_DIR. '/cache/kcj-cache');
define('DCH_MIN_WP', '4.1');

// hooks
add_action(
	'plugins_loaded',
	array(
		'kcj_Cache',
		'instance'
	)
);
register_activation_hook(
	__FILE__,
	array(
		'kcj_Cache',
		'on_activation'
	)
);
register_deactivation_hook(
	__FILE__,
	array(
		'kcj_Cache',
		'on_deactivation'
	)
);
register_uninstall_hook(
	__FILE__,
	array(
		'kcj_Cache',
		'on_uninstall'
	)
);


// autoload register
spl_autoload_register('dch_core_autoload');

// autoload function
function dch_core_autoload($class) {
	if ( in_array($class, array('kcj_Cache', 'kcj_Cache_Disk')) ) {
		require_once(
			sprintf(
				'%s/core/%s.php',
				DCH_DIR,
				strtolower($class)
			)
		);
	}
}
