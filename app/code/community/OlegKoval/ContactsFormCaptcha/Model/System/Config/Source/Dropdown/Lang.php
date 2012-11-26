<?php
/**
 * Custom options for "reCaptcha Language" dropdown of "Contacts Form Captcha" customization
 *
 * @category    OlegKoval
 * @package     OlegKoval_ContactsFormCaptcha
 * @copyright   Copyright (c) 2012 Oleg Koval
 * @author      Oleg Koval <oleh.koval@gmail.com>
 */
class OlegKoval_ContactsFormCaptcha_Model_System_Config_Source_Dropdown_Lang {
    public function toOptionArray() {
        return array(
            array(
                'value' => 'en',
                'label' => 'English (default)',
            ),
            array(
                'value' => 'nl',
                'label' => 'Dutch',
            ),
            array(
                'value' => 'fr',
                'label' => 'French',
            ),
            array(
                'value' => 'de',
                'label' => 'German',
            ),
            array(
                'value' => 'pt',
                'label' => 'Portuguese',
            ),
            array(
                'value' => 'ru',
                'label' => 'Russian',
            ),
            array(
                'value' => 'es',
                'label' => 'Spanish',
            ),
            array(
                'value' => 'tr',
                'label' => 'Turkish',
            ),
        );
    }
}