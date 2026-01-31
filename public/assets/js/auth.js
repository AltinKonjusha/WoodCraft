document.addEventListener("DOMContentLoaded", () => {

    const signupForm = document.getElementById("signupForm");
    if (signupForm) {
        signupForm.addEventListener("submit", (e) => {

            const fullName = document.getElementById("fullName").value.trim();
            const email = document.getElementById("signupEmail").value.trim();
            const password = document.getElementById("signupPassword").value;
            const confirm = document.getElementById("signupConfirm").value;

            // Prevent submit only if invalid
            if (!fullName || !email || !password || !confirm) {
                e.preventDefault();
                alert("All fields must be filled.");
                return;
            }

            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                e.preventDefault();
                alert("Enter a valid email.");
                return;
            }

            if (password.length < 8) {
                e.preventDefault();
                alert("Password must be at least 8 characters.");
                return;
            }

            if (password !== confirm) {
                e.preventDefault();
                alert("Passwords do not match.");
                return;
            }

            // ✅ Remove any alert or form reset
            // Form will now submit to PHP backend
        });
    }

    /* =========================
       LOGIN VALIDATION
    ========================= */
    const loginForm = document.getElementById("loginForm");
    if (loginForm) {
        loginForm.addEventListener("submit", (e) => {

            const email = document.getElementById("loginEmail").value.trim();
            const password = document.getElementById("loginPassword").value;

            if (!email || !password) {
                e.preventDefault();
                alert("Email and password must be filled.");
                return;
            }

            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                e.preventDefault();
                alert("Enter a valid email.");
                return;
            }

            if (password.length < 8) {
                e.preventDefault();
                alert("Password must be at least 8 characters.");
                return;
            }

            // ✅ Valid input → allow form submit to backend
        });
    }

});
