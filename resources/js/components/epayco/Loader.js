
import React from "react";

const Loader = () => (
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
);

export default Loader;