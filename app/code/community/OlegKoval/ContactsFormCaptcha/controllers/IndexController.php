<?php
/**
 * Contacts Form Captcha index controller
 *
 * @category    OlegKoval
 * @package     OlegKoval_ContactsFormCaptcha
 * @copyright   Copyright (c) 2012 Oleg Koval
 * @author      Oleg Koval <oleh.koval@gmail.com>
 */
//include controller to override it
require_once(Mage::getBaseDir('app') . DS .'code'. DS .'core'. DS .'Mage'. DS .'Contacts'. DS .'controllers'. DS .'IndexController.php');

class OlegKoval_ContactsFormCaptcha_IndexController extends Mage_Contacts_IndexController {
    const XML_PATH_CFC_ENABLED     = 'contacts/olegkoval_contactsformcaptcha/enabled';
    const XML_PATH_CFC_PUBLIC_KEY  = 'contacts/olegkoval_contactsformcaptcha/public_key';
    const XML_PATH_CFC_PRIVATE_KEY = 'contacts/olegkoval_contactsformcaptcha/private_key';

    /**
     * Check if "Contacts Form Captcha" is enabled
     */
    public function preDispatch() {
        parent::preDispatch();
    }

    /**
     * Method which handle action of displaying contact form
     */
    public function indexAction() {
        $this->loadLayout();

        if (Mage::getStoreConfigFlag(self::XML_PATH_CFC_ENABLED)) {
            //include reCaptcha library
            require_once(Mage::getBaseDir('lib') . DS .'reCaptcha'. DS .'recaptchalib.php');
            
            //create captcha html-code
            $publickey = Mage::getStoreConfig(self::XML_PATH_CFC_PUBLIC_KEY);
            $captcha_code = recaptcha_get_html($publickey);

            $this->getLayout()->getBlock('contactForm')->setTemplate('contactsformcaptcha/form.phtml')->setFormAction(Mage::getUrl('*/*/post'))->setCaptchaCode($captcha_code);
        }
        else {
            $this->getLayout()->getBlock('contactForm')->setFormAction(Mage::getUrl('*/*/post'));
        }

        $this->_initLayoutMessages('customer/session');
        $this->_initLayoutMessages('catalog/session');
        $this->renderLayout();
    }

    /**
     * Handle post request of Contact form
     * @return [type] [description]
     */
    public function postAction() {
        if (Mage::getStoreConfigFlag(self::XML_PATH_CFC_ENABLED)) {
            try {
                $post = $this->getRequest()->getPost();
                if ($post) {
                    //include reCaptcha library
                    require_once(Mage::getBaseDir('lib') . DS .'reCaptcha'. DS .'recaptchalib.php');
                    
                    //validate captcha
                    $privatekey = Mage::getStoreConfig(self::XML_PATH_CFC_PRIVATE_KEY);
                    $remote_addr = $this->getRequest()->getServer('REMOTE_ADDR');
                    $captcha = recaptcha_check_answer($privatekey, $remote_addr, $post["recaptcha_challenge_field"], $post["recaptcha_response_field"]);

                    if (!$captcha->is_valid) {
                        throw new Exception("The reCAPTCHA wasn't entered correctly. Go back and try it again.", 1);
                    }
                }
                else {
                    throw new Exception('', 1);
                }
            }
            catch (Exception $e) {
                if (strlen($e->getMessage()) > 0) {
                    Mage::getSingleton('customer/session')->addError($this->__($e->getMessage()));
                }
                $this->_redirect('*/*/');
                return;
            }
        }

        //everything is OK - call parent action
        parent::postAction();
    }
}