import React, { useEffect, useState } from 'react';

import Loader from "./Loader"

function Checkout(){
  
  const [ name, setName ] = useState(null);
  useEffect(()=>{
      function fetchDataEmployee(){
      let name = document.getElementById("info");
      if(name.innerHTML.length >1){
        setName(name.innerHTML)
      }else{
        setName("Name")
      }
    }
    fetchDataEmployee();
    
  },[])

  const openCheckout = () => {
    debugger
    const data = {name}
    const urlParams = new URLSearchParams(window.location.search);
    let publickey= urlParams.get("publicKey");
    const handler = window.ePayco.checkout.configure({
		  key: 's',
		  test: false
	  });

  }


  return (
    <section>
        <Loader />
        <center>
          <a href='#' className="epayco-button"
           onClick={()=>openCheckout()}><img src='https://multimedia.epayco.co/epayco-landing/btns/Boton-epayco-color-Ingles.png'/>
          </a>
        </center>
    </section>
  )
}

export default Checkout;
