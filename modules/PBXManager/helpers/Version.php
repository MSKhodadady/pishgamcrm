<?php
/* * *******************************************************************************
 * The content of this file is subject to the PBXManager Module license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is VTFarsi.ir
 * Portions created by VTfarsi.ir are Copyright(C) VTFarsi Team
 * All Rights Reserved.
 * ****************************************************************************** */
class PBXManager_Version_Helper {

    public static $version = '2.9';
    public static $patch = '14010623';

    public static function getVersion()
    {
        return self::$version;
    }
    
    public static function getPatch()
    {
        return self::$patch;
    }

}