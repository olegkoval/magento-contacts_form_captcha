<?php
/**
 * Custom options for "reCaptcha Theme" dropdown of "Contacts Form Captcha" customization
 *
 * @category    OlegKoval
 * @package     OlegKoval_ContactsFormCaptcha
 * @copyright   Copyright (c) 2012 - 2016 Oleg Koval
 * @author      Oleg Koval <oleh.koval@gmail.com>
 */
class OlegKoval_ContactsFormCaptcha_Model_System_Config_Source_Dropdown_Theme {
    /**
     * Generate theme options array
     * @return array
     */
    public function toOptionArray() {
        return array(
            array(
                'value' => 'light',
                'label' => 'Light (default)',
            ),
            array(
                'value' => 'dark',
                'label' => 'Dark',
            ),
        );
    }
}