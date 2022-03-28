<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="height=device-height, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <script src="https://d35z3p2poghz10.cloudfront.net/ecwid-sdk/js/1.2.5/ecwid-app.js"></script>
    <link rel="stylesheet" href="https://d35z3p2poghz10.cloudfront.net/ecwid-sdk/css/1.3.7/ecwid-app-ui.css" />

    <style>
        /* Custom styles to remove a-card box shadow and border */
        .a-card {
            border: none;
            border-radius: 0px;
            box-shadow: none;
        }
    </style>

</head>

<body>
    <div>
        <div>
            <div class="named-area">
                <div class="named-area__body">
                    <!-- Check input element for example of how to set data attributes to save to storage later -->
                    <div class="a-card a-card--normal">
                        <div class="a-card__paddings">
                            <div class="payment-method">
                                <div class="payment-method__header">
                                    <div class="payment-method__logo">
                                        <img src="https://multimedia.epayco.co/epayco-landing/btns/epayco-logo-fondo-oscuro.png" width="336" height="144" alt="">
                                    </div>
                                </div>
                                <div class="payment-method__title">Accept payments on your website</div>
                                <div class="payment-method__content">
                                    <div class="form-area">
                                        <div class="form-area__content">
                                            <p>
											ePayco is a company that specializes in processing online payments allowing people or businesses to make payments, collections and recharges in an easy and secure way </p>
                                            <p>Your customers' data is completely safe and with a system of anti-fraud options
                                			to suit your business.
                                            </p>
                                        </div>

                                        <div class="columned tap-settings">
                                            <div class="columned__item">

                                                <div class="form-area__content">
                                                    <div class="fieldsets-batch">
                                                        <div class="form-area__title">Configure Account</div>

                                                        <div class="fieldset fieldset-itransact">
                                                            <div class="fieldset__field-wrapper">
                                                                <div class="field field--medium">
                                                                    <span class="fieldset__svg-icon"></span>
                                                                    <label class="field__label">P_CUST_ID_CLIENTE</label>

                                                            
                                                                    <input data-name="p_cust_id_cliente"
                                                                        data-visibility="private" type="text"
                                                                        class="field__input">

                                                                    <div class="field__placeholder">P_CUST_ID_CLIENTE
                                                                    </div>
                                                                    <span class="field-state--success"><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="26px" height="26px"
                                                                            viewBox="0 0 26 26" focusable="false">
                                                                            <path
                                                                                d="M5 12l5.02 4.9L21.15 4c.65-.66 1.71-.66 2.36 0 .65.67.65 1.74 0 2.4l-12.3 14.1c-.33.33-.76.5-1.18.5-.43 0-.86-.17-1.18-.5l-6.21-6.1c-.65-.66-.65-1.74 0-2.41.65-.65 1.71-.65 2.36.01z">
                                                                            </path>
                                                                        </svg></span><span
                                                                        class="field-state--close"><svg version="1.1"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            x="0px" y="0px" viewBox="0 0 16 16"
                                                                            enable-background="new 0 0 16 16"
                                                                            xml:space="preserve" focusable="false">
                                                                            <path
                                                                                d="M15.6,15.5c-0.53,0.53-1.38,0.53-1.91,0L8.05,9.87L2.31,15.6c-0.53,0.53-1.38,0.53-1.91,0 c-0.53-0.53-0.53-1.38,0-1.9l5.65-5.64L0.4,2.4c-0.53-0.53-0.53-1.38,0-1.91c0.53-0.53,1.38-0.53,1.91,0l5.64,5.63l5.74-5.73 c0.53-0.53,1.38-0.53,1.91,0c0.53,0.53,0.53,1.38,0,1.91L9.94,7.94l5.66,5.65C16.12,14.12,16.12,14.97,15.6,15.5z">
                                                                            </path>
                                                                        </svg></span>
                                                                </div>
                                                                <div class="fieldset__field-prefix"></div>
                                                                <div class="fieldset__field-suffix"></div>

                                                            </div>
                                                            <div class="field__error" aria-hidden="true"
                                                                style="display: none;"></div>

                                                            <div class="fieldset__note" aria-hidden="true"
                                                                style="display: none;"></div>
                                                        </div>
                                                        <div class="fieldset fieldset-itransact">
                                                            <div class="fieldset__field-wrapper">
                                                                <div class="field field--medium">
                                                                    <span class="fieldset__svg-icon"></span>
                                                                    <label class="field__label">PUBLIC_KEY</label>

                                                                    <input data-name="public_key"
                                                                        data-visibility="private" type="password"
                                                                        class="field__input">

                                                                    <div class="field__placeholder">PUBLIC_KEY
                                                                    </div>
                                                                    <span class="field-state--success"><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="26px" height="26px"
                                                                            viewBox="0 0 26 26" focusable="false">
                                                                            <path
                                                                                d="M5 12l5.02 4.9L21.15 4c.65-.66 1.71-.66 2.36 0 .65.67.65 1.74 0 2.4l-12.3 14.1c-.33.33-.76.5-1.18.5-.43 0-.86-.17-1.18-.5l-6.21-6.1c-.65-.66-.65-1.74 0-2.41.65-.65 1.71-.65 2.36.01z">
                                                                            </path>
                                                                        </svg></span><span
                                                                        class="field-state--close"><svg version="1.1"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            x="0px" y="0px" viewBox="0 0 16 16"
                                                                            enable-background="new 0 0 16 16"
                                                                            xml:space="preserve" focusable="false">
                                                                            <path
                                                                                d="M15.6,15.5c-0.53,0.53-1.38,0.53-1.91,0L8.05,9.87L2.31,15.6c-0.53,0.53-1.38,0.53-1.91,0 c-0.53-0.53-0.53-1.38,0-1.9l5.65-5.64L0.4,2.4c-0.53-0.53-0.53-1.38,0-1.91c0.53-0.53,1.38-0.53,1.91,0l5.64,5.63l5.74-5.73 c0.53-0.53,1.38-0.53,1.91,0c0.53,0.53,0.53,1.38,0,1.91L9.94,7.94l5.66,5.65C16.12,14.12,16.12,14.97,15.6,15.5z">
                                                                            </path>
                                                                        </svg></span>
                                                                </div>
                                                                <div class="fieldset__field-prefix"></div>
                                                                <div class="fieldset__field-suffix"></div>

                                                            </div>
                                                            <div class="field__error" aria-hidden="true"
                                                                style="display: none;"></div>

                                                            <div class="fieldset__note" aria-hidden="true"
                                                                style="display: none;"></div>
                                                        </div>
                                                        <div class="fieldset fieldset-itransact">
                                                            <div class="fieldset__field-wrapper">
                                                                <div class="field field--medium">
                                                                    <span class="fieldset__svg-icon"></span>
                                                                    <label class="field__label">P_KEY</label>

                                                                    <input data-name="p_key"
                                                                        data-visibility="private" type="password"
                                                                        class="field__input">

                                                                    <div class="field__placeholder">P_KEY
                                                                    </div>
                                                                    <span class="field-state--success"><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="26px" height="26px"
                                                                            viewBox="0 0 26 26" focusable="false">
                                                                            <path
                                                                                d="M5 12l5.02 4.9L21.15 4c.65-.66 1.71-.66 2.36 0 .65.67.65 1.74 0 2.4l-12.3 14.1c-.33.33-.76.5-1.18.5-.43 0-.86-.17-1.18-.5l-6.21-6.1c-.65-.66-.65-1.74 0-2.41.65-.65 1.71-.65 2.36.01z">
                                                                            </path>
                                                                        </svg></span><span
                                                                        class="field-state--close"><svg version="1.1"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            x="0px" y="0px" viewBox="0 0 16 16"
                                                                            enable-background="new 0 0 16 16"
                                                                            xml:space="preserve" focusable="false">
                                                                            <path
                                                                                d="M15.6,15.5c-0.53,0.53-1.38,0.53-1.91,0L8.05,9.87L2.31,15.6c-0.53,0.53-1.38,0.53-1.91,0 c-0.53-0.53-0.53-1.38,0-1.9l5.65-5.64L0.4,2.4c-0.53-0.53-0.53-1.38,0-1.91c0.53-0.53,1.38-0.53,1.91,0l5.64,5.63l5.74-5.73 c0.53-0.53,1.38-0.53,1.91,0c0.53,0.53,0.53,1.38,0,1.91L9.94,7.94l5.66,5.65C16.12,14.12,16.12,14.97,15.6,15.5z">
                                                                            </path>
                                                                        </svg></span>
                                                                </div>
                                                                <div class="fieldset__field-prefix"></div>
                                                                <div class="fieldset__field-suffix"></div>

                                                            </div>
                                                            <div class="field__error" aria-hidden="true"
                                                                style="display: none;"></div>

                                                            <div class="fieldset__note" aria-hidden="true"
                                                                style="display: none;"></div>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="titled-items-list__item">
                                                    <div class="fieldset fieldset--select fieldset--no-label" style="width: 50%;">
                                                        <div class="fieldset__title" style="">Checkout Language</div>
                                                        <div>
                                                            <div>
                                                                <div class="field field--medium field--filled"><label class="field__label"></label> 

                                                                <!-- Condition dropdown list. Use data attributes as below to save and update the value to/from application storage via functions.js -->

                                                                <select data-name="language" data-visibility="public" class="field__select" tabindex="1" id="language">
                                                                    <option value="ES">Spanish</option>
                                                                    <option value="EN">English</option>
                                                                </select>

                                                                <div class="field__placeholder"></div>
                                                                    <span class="field-state--success"><svg xmlns="http://www.w3.org/2000/svg" width="26px" height="26px" viewBox="0 0 26 26" focusable="false"><path d="M5 12l5.02 4.9L21.15 4c.65-.66 1.71-.66 2.36 0 .65.67.65 1.74 0 2.4l-12.3 14.1c-.33.33-.76.5-1.18.5-.43 0-.86-.17-1.18-.5l-6.21-6.1c-.65-.66-.65-1.74 0-2.41.65-.65 1.71-.65 2.36.01z"></path></svg></span>
                                                                    <span class="field-state--close"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 16 16" enable-background="new 0 0 16 16" xml:space="preserve" focusable="false">
                                                                    <path d="M15.6,15.5c-0.53,0.53-1.38,0.53-1.91,0L8.05,9.87L2.31,15.6c-0.53,0.53-1.38,0.53-1.91,0
                                                                        c-0.53-0.53-0.53-1.38,0-1.9l5.65-5.64L0.4,2.4c-0.53-0.53-0.53-1.38,0-1.91c0.53-0.53,1.38-0.53,1.91,0l5.64,5.63l5.74-5.73
                                                                        c0.53-0.53,1.38-0.53,1.91,0c0.53,0.53,0.53,1.38,0,1.91L9.94,7.94l5.66,5.65C16.12,14.12,16.12,14.97,15.6,15.5z"></path>
                                                                    </svg></span> <span class="field__arrow"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 26" focusable="false"><path d="M7.85 10l5.02 4.9 5.27-4.9c.65-.66 1.71-.66 2.36 0 .65.67.65 1.74 0 2.4l-6.45 6.1c-.33.33-.76.5-1.18.5-.43 0-.86-.17-1.18-.5l-6.21-6.1c-.65-.66-.65-1.74 0-2.41.66-.65 1.72-.65 2.37.01z"></path></svg></span>
                                                                </div>
                                                            </div>
                                                            <div class="field__error" aria-hidden="true" style="display: none;"></div>
                                                        </div>
                                                        <div class="fieldset__note"></div>
                                                    </div>
                                                </div>


                                                <!-- Advanced settings START-->
                                                <div class="collapsible collapsible--opened">
                                                    <div class="collapsible__header">Advanced settings</div>
                                                    <div class="collapsible__body" style='max-height: 2000vh;'>
           
                                                        <div class="form-area__content">
                                                            <div class="custom-checkbox">
                                                                <label>
                                                                    <input data-name="testMode"
                                                                        data-visibility="private" type="checkbox"
                                                                        checked="true" value="on"
                                                                        class="custom-checkbox__input">
                                                                    <span class="custom-checkbox__label"></span>
                                                                    <span class="custom-checkbox__text">Enable test mode
                                                                        (no charges)</span>
                                                                </label>
                                                                <div class="custom-checkbox__note muted text-small">
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Advanced settings END -->

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/payco.js') }}" defer></script>
    <script src="https://d35z3p2poghz10.cloudfront.net/ecwid-sdk/css/1.3.7/ecwid-app-ui.min.js"></script>
    <script>
        // Autosave feature for fields. Complimentary JS for the one from SDK above
        (function initFieldset() {
            var elms = document.querySelectorAll('.field__input, .field__select, .field__textarea, .radio, .custom-checkbox__input');
            for (var i = 0; i < elms.length; i++) {
                elms[i].addEventListener('blur', function (e) {
                    checkFieldChange(this);
                    if (this.classList.contains('field__input') || this.classList.contains('field__textarea')) {
                        saveUserData();
                    }
                }, false);
                elms[i].addEventListener('change', function () {
                    if (this.value) {
                        saveUserData();
                    }
                    else {
                        saveUserData();
                    }
                    if (this.id == "mode_selector") {

                        if (this.value == "IBX") {
                            var elms = document.querySelectorAll('.fieldset-ibx');
                            for (var i = 0; i < elms.length; i++) {
                                elms[i].style.display = "block";
                            }
                            var elms = document.querySelectorAll('.fieldset-itransact');
                            for (var i = 0; i < elms.length; i++) {
                                elms[i].style.display = "none";
                            }
                        } else {
                            var elms = document.querySelectorAll('.fieldset-itransact');
                            for (var i = 0; i < elms.length; i++) {
                                elms[i].style.display = "block";
                            }
                            var elms = document.querySelectorAll('.fieldset-ibx');
                            for (var i = 0; i < elms.length; i++) {
                                elms[i].style.display = "none";
                            }

                        }

                    }

                }, false);
                elms[i].addEventListener('click', function () {
                    if (this.value) {
                        saveUserData();
                    }
                    else {
                        saveUserData();
                    }
                }, false);
            }
            setTimeout(function () { document.querySelector("#mode_selector").dispatchEvent(new Event("change")) }, 1500)
        }
        )();
    </script>
</body>

</html>