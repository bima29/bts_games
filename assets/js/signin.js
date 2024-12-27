function toggleVisibility(toggleId, inputId) {
    const togglePassword = document.getElementById(toggleId);
    const passwordInput = document.getElementById(inputId);

    togglePassword.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
    });
}

toggleVisibility('togglePassword1', 'password');
toggleVisibility('togglePassword2', 'passwordVer');