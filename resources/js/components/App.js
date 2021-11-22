import React from "react";
import ReactDOM from "react-dom";
import { BrowserRouter, Route, Routes } from "react-router-dom";
import Login from "./Login";

const App = () => {
    return (
        <BrowserRouter>
            <Routes>
                <Route exact path="/" />
                <Route exact path="/login" element={<Login />} />
            </Routes>
        </BrowserRouter>
    );
};
export default App;
if (document.getElementById("app")) {
    ReactDOM.render(<App />, document.getElementById("app"));
}
