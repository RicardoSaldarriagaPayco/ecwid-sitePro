import React  from 'react';
import ReactDOM from 'react-dom';
import '../../css/app.css';

function Checkout() {
    
      const openCheckout = () => {
        debugger
        const data = 'h'
        const urlParams = new URLSearchParams(window.location.search);
        let publickey= urlParams.get("publicKey");
        const handler = window.ePayco.checkout.configure({
    		  key: 's',
    		  test: false
    	  });
    
      }
    return (
        <div>
            <div>
              <div className="loader-container">
                <div className="loading"></div>
              </div>
              <p style={{textAlign: 'center'}} className="epayco-title">
              <span className="animated-points">Loading payment methods</span>
               <br/>
               <small className="epayco-subtitle"> 
               If they do not load automatically, click on the "Pay with ePayco" button
                </small>
              </p>
            </div>
            <center>
            <a href='#' className="epayco-button"
                onClick={()=>openCheckout()}><img src='https://multimedia.epayco.co/epayco-landing/btns/Boton-epayco-color-Ingles.png'/>
            </a>
        </center>
        </div>
    );
}

export default Checkout;

if (document.getElementById('checkout')) {
    ReactDOM.render(<Checkout />, document.getElementById('checkout'));
}
