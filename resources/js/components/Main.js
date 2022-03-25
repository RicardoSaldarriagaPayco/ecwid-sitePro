import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import Checkout from "./epayco/Checkout"
import '../../css/app.css';

import {
  BrowserRouter as Router,
  Switch,
  Route
} from "react-router-dom";
  
function Main(){
  return (
    <Router>
      <main>
        <Switch>
          <Route path="/checkout" component={Checkout} />  
        </Switch>
      </main>
    </Router>
  )
}

export default Main;
ReactDOM.render(<React.StrictMode><Main /></React.StrictMode>, document.getElementById('main-checkout'));
