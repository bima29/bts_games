document.addEventListener('DOMContentLoaded', () => {
    const chatForm = document.getElementById('chatForm');
    const chatInput = document.getElementById('chatInput');
    const chatBox = document.getElementById('chatBox');

    chatForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const userMessage = chatInput.value.trim();
        if (userMessage === '') return;

        const userChat = document.createElement('div');
        userChat.classList.add('chat-message', 'user');
        userChat.innerHTML = `<p>${userMessage}</p>`;
        chatBox.appendChild(userChat);

        chatInput.value = '';

        chatBox.scrollTop = chatBox.scrollHeight;

        setTimeout(() => {
            const adminChat = document.createElement('div');
            adminChat.classList.add('chat-message', 'admin');
            adminChat.innerHTML = `<p>Terima kasih atas pesan Anda. Kami akan segera menjawab.</p>`;
            chatBox.appendChild(adminChat);
            chatBox.scrollTop = chatBox.scrollHeight;
        }, 1000);
    });
});
