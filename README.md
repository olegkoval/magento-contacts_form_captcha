Contacts Form Captcha
=====================

"Contacts Form Captcha" extension add in easy way the captcha to "Contact Us" form and will protect "Contact US" form from unwanted spambots.

This extension uses reCaptcha library (http://www.google.com/recaptcha).

## EXTENSION on MagentoConnect
https://www.magentocommerce.com/magento-connect/contacts-form-captcha.html

## INSTRUCTION
* Sign up for a reCAPTCHA account on http://www.google.com/recaptcha
* Open configuration page of "Contacts Form Captcha": [Top menu of Magento Store Admin Panel] System -> Configuration -> [select tab] Contatcs -> [expand section] Contacts Form Captcha
* Enable extension: "Enable Captcha" set to "Yes"
* Enter the public and private API keys from reCAPTCHA in "Public Key"/"Private Key" fields
* Save Config

## CUSTOM DESIGN
* If you have a custom design, you will need to update the corresponding "Contacts Form Captcha" file:
    app/design/frontend/base/default/template/contactsformcaptcha/form.phtml
