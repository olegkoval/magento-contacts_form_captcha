<?php
/**
 * Custom options for "reCaptcha Theme" dropdown of "Contacts Form Captcha" customization
 *
 * @category    OlegKoval
 * @package     OlegKoval_ContactsFormCaptcha
 * @copyright   Copyright (c) 2012 Oleg Koval
 * @author      Oleg Koval <oleh.koval@gmail.com>
 */
class OlegKoval_ContactsFormCaptcha_Model_System_Config_Source_Dropdown_Theme {
    public function toOptionArray() {
        return array(
            array(
                'value' => 'red',
                'label' => 'Red (default)',
            ),
            array(
                'value' => 'white',
                'label' => 'White',
            ),
            array(
                'value' => 'blackglass',
                'label' => 'Blackglass',
            ),
            array(
                'value' => 'clean',
                'label' => 'Clean',
            ),
        );
    }
}