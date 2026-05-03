<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Admin Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body {
    background: linear-gradient(120deg, #0f172a, #1e293b);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: Inter;
}

.login-card {
    width: 380px;
    padding: 30px;
    border-radius: 20px;
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(15px);
    box-shadow: 0 0 30px rgba(0,0,0,0.4);
    color: white;
    animation: fadeIn 0.8s ease;
}

@keyframes fadeIn {
    from {opacity: 0; transform: translateY(-20px);}
    to {opacity: 1; transform: translateY(0);}
}

input {
    background: rgba(255,255,255,0.1) !important;
    border: none !important;
    color: white !important;
}

input::placeholder {
    color: #cbd5e1;
}

.btn-login {
    background: #38bdf8;
    border: none;
    transition: 0.3s;
}

.btn-login:hover {
    background: #0ea5e9;
    transform: scale(1.03);
}

</style>

</head>

<body>

<div class="login-card">

<h3 class="text-center mb-4">🔐 Admin Login</h3>

<form method="POST" action="index.php?page=login">

<input type="email" name="email" class="form-control mb-3" placeholder="Email" required>

<input type="password" name="password" class="form-control mb-3" placeholder="Mot de passe" required>

<button class="btn btn-login w-100">Se connecter</button>

</form>

</div>

</div>

</body>
</html>