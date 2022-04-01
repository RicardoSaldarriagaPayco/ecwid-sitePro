import React  from 'react';
import ReactDOM from 'react-dom';
import '../../css/app.css';

function Checkout() {
    window.onload = function() {
        openCheckout()
    }
    const openCheckout = () => {
        const urlParams = new URLSearchParams(window.location.search);
        let publickey= urlParams.get("publicKey");
        let testEnv= urlParams.get("test");
        let orderName= urlParams.get("referenceTransactionId");
        let orderDescription= urlParams.get("orderDescription");
        let orderNumber= urlParams.get("orderNumber");
        let orderCurrencyr= urlParams.get("currency");
        let orderAmount= urlParams.get("total");
        let orderBaseAmount= urlParams.get("subTotalPrice");
        let ordertax= urlParams.get("tax");
        let countryCode= urlParams.get("countryCode");
        let epaycoLanguage= urlParams.get("epaycoLanguage");
        let oderExtra1= urlParams.get("extra1");
        let oderExtra2= urlParams.get("orderId");
        let confirmUrl= urlParams.get("confirmUrl");
        let returnUrl= urlParams.get("returnUrl");
        let customer_name= urlParams.get("customer_name");
        let customer_address= urlParams.get("customer_address");
        let customer_email= urlParams.get("customer_email");
        const handler = window.ePayco.checkout.configure({
            key: publickey,
            test: testEnv
        });

        var data={
            //Parametros compra (obligatorio)
            name: "Order number "+ oderExtra2,
            description: orderDescription,
            invoice: oderExtra2,
            currency: orderCurrencyr,
            amount: orderAmount,
            tax_base: orderBaseAmount,
            tax: ordertax,
            country: countryCode,
            lang: epaycoLanguage,
            //Onpage="false" - Standard="true"
            external: "true",
            //Atributos opcionales
            extra1: oderExtra1,
            extra2: oderExtra2,

            confirmation: confirmUrl,
            response: returnUrl,
            //Atributos cliente
            name_billing: customer_name,
            address_billing: customer_address,
            email_billing: customer_email
        }
        handler.open(data)
    }
    return (
        <div>
            <div>
                <p style={{textAlign: 'center'}} className="epayco-title">
                    <br/>
                    <small className="epayco-subtitle">
                    </small>
                </p>
            </div>
            <center>
                <div className="loader"></div>
                <a href='#' className="epayco-button"
                   onClick={()=>openCheckout()}>
                </a>
            </center>
        </div>
    );
}

export default Checkout;

if (document.getElementById('checkout')) {
    ReactDOM.render(<Checkout />, document.getElementById('checkout'));
}
