import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
// resources/js/app.js

document.addEventListener('DOMContentLoaded', function () {
    const messageForm = document.getElementById('message-form');
    const messageInput = document.getElementById('message-input');
    const messagesContainer = document.getElementById('messages');

    messageForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const message = messageInput.value.trim();
        if (message !== '') {
            // Append the message to the messages container
            appendMessage(message);

            // Clear the input field
            messageInput.value = '';
        }
    });

    function appendMessage(message) {
        const messageElement = document.createElement('div');
        messageElement.textContent = message;
        messagesContainer.appendChild(messageElement);

        // Optionally, you can scroll to the bottom to show the latest message
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }
});

