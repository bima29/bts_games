<?php
$title = 'All Game||BTS Store';
?>
<div class="container-fluid" style="background-image:url('https://gamebrott.com/wp-content/uploads/2021/06/4-League.jpg');
background-size: cover;
background-position: center;
background-repeat: no-repeat;
background-attachment: fixed;
overflow: auto;
height: 100%;
">
    <div class="container mt-5 rounded" style="background-color: rgba(0, 0, 0, 0.4);">
        <div class="container d-flex align-items-center shadow p-5 rounded">
            <div class="bg-white rounded-pill shadow p-3 d-inline-block">
                <img src="<?= base_url('assets/img/live-chat.png') ?>" alt="Location Icon" class="img-fluid" style="max-width: 70px; max-height: 70px; object-fit: cover;">
            </div>

            <div class="ms-5">
            <p class="mb-0 responsive-p">btsstoreindonesia.com</p>                
            <h1 class="mt-2 text-white">Live Chat</h1>
            </div>
        </div>

        <div class="container mt-5 mb-5">
            <div class="chat-box" id="chatBox" style="background-color: rgba(225, 225, 225, 0.4);">
                <div class="chat-message admin">
                    <p>Halo! Ada yang bisa kami bantu?</p>
                </div>
            </div>

            <style>
                .custom-input {
                    background-color: var(--input-bg-color, rgba(0, 0, 0, 0.4));
                    color: var(--input-text-color, white);
                    border: 1px solid var(--input-border-color, #ccc);
                }

                .custom-input::placeholder {
                    color: var(--input-placeholder-color, #aaa);
                }
            </style>
            <form id="chatForm" class="mt-3">
                <div class="input-group mb-2">
                    <input
                        type="text"
                        id="chatInput"
                        class="form-control custom-input"
                        placeholder="Ketik pesan..."
                        required>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
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
</script>