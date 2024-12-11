<link rel="stylesheet" href="<?= base_url('assets/css/livechat.css') ?>">

<div class="container-fluid container-bg-img-livechat">
    <div class="container mt-5 rounded bg-color-blur-black-4">
        <div class="container d-flex align-items-center shadow p-5 rounded">
            <div class="bg-white rounded-pill shadow p-3 d-inline-block">
                <img src="<?= base_url('assets/img/live-chat.png') ?>" alt="Location Icon" class="img-fluid img-fluid-location">
            </div>

            <div class="ms-5">
                <p class="mb-0 responsive-p">btsstoreindonesia.com</p>
                <h1 class="mt-2 text-white">Live Chat</h1>
            </div>
        </div>

        <div class="container mt-5 mb-5">
            <div class="chat-box bg-color-blur-white-4" id="chatBox">
                <div class="chat-message admin">
                    <p>Halo! Ada yang bisa kami bantu?</p>
                </div>
            </div>
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

<script src="<?= base_url('assets/js/livechat.js') ?>"></script>