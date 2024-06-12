import axios from 'axios';
import React, { useState } from "react";

const MessageInput = ({ rootUrl }) => {
    const [message, setMessage] = useState("");

    const messageRequest = async (text) => {
        try {
            
            await axios.post(`${rootUrl}/message`, {
                text,
            });
        } catch (err) {
            console.log(err.message);
        }
    };

    const sendMessage = (e) => {
        e.preventDefault();
        if (message.trim() === "") {
            alert("Por favor, introduzca un mensaje!");
            return;
        }

        messageRequest(message);
        setMessage("");
    };
    console.log('pasa1');
    return (
        <div className="input-group">
            <input onChange={(e) => setMessage(e.target.value)}
                   autoComplete="off"
                   type="text"
                   className="form-control"
                   placeholder="Mensaje..."
                   value={message}
            />
            <div className="input-group-append">
                <button onClick={(e) => sendMessage(e)}
                        className="btn btn-primary"
                        type="button">Enviar</button>
            </div>
        </div>
    );
};

export default MessageInput;