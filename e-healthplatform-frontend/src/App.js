import React from 'react';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';
import MedicalRecordList from './components/MedicalRecordList';
import AppointmentForm from './components/AppointmentForm';

function App() {
  return (
    <Router>
      <div>
        <nav>
          <a href="/">Medical Records</a>
          <a href="/appointments">Create Appointment</a>
        </nav>
        <Switch>
          <Route path="/" exact component={MedicalRecordList} />
          <Route path="/appointments" component={AppointmentForm} />
        </Switch>
      </div>
    </Router>
  );
}

export default App;
