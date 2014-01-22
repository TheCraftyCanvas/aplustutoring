<?php
/**
 * ======================================================================
 * LICENSE: This file is subject to the terms and conditions defined in *
 * file 'license.txt', which is part of this source code package.       *
 * ======================================================================
 */

/**
 *
 * @package AAM
 * @author Vasyl Martyniuk <support@wpaam.com>
 * @copyright Copyright C 2013 Vasyl Martyniuk
 * @license GNU General Public License {@link http://www.gnu.org/licenses/}
 */
class aam_Control_Object_Menu extends aam_Control_Object {

    /**
     *
     */
    const UID = 'menu';

    /**
     *
     * @var type
     */
    private $_option = array();

    /**
     *
     * @global type $menu
     * @global type $submenu
     */
    public function filter() {
        global $menu, $submenu;

        //filter menu & submenu first
        $random = uniqid('aam_'); //oopsie, random capability - no access
        //let's go and iterate menu & submenu
        foreach ($menu as $id => $item) {
            if ($this->has($item[2])) {
                unset($menu[$id]); // also remove the menu from the list
                $menu[$id][1] = $random;
            }
            //go to submenu
            if (isset($submenu[$item[2]])) {
                foreach ($submenu[$item[2]] as $sid => $sub_item) {
                    if ($this->has($sub_item[2])) {
                        $submenu[$item[2]][$sid][1] = $random;
                    }
                }
            }
        }
    }

    /**
     *
     * @param type $menu
     */
    public function save($menu = null) {
        if (is_array($menu)) {
            $this->getSubject()->updateOption($menu, self::UID);
        }
    }

    /**
     *
     * @return type
     */
    public function backup() {
        return $this->getSubject()->readOption(self::UID, '', array());
    }

    /**
     *
     * @return type
     */
    public function getUID() {
        return self::UID;
    }

    /**
     *
     * @param type $option
     */
    public function setOption($option) {
        $this->_option = (is_array($option) ? $option : array());
    }

    /**
     *
     * @return type
     */
    public function getOption() {
        return $this->_option;
    }

    /**
     *
     * @param type $menu
     * @return type
     */
    public function has($menu) {
        $response = false;
        if (isset($this->_option[$menu])) {
            $response = (intval($this->_option[$menu]) ? true : false);
        }

        return $response;
    }

}