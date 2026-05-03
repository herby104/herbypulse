<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f8fafc;
    font-family:"Segoe UI",sans-serif;
}

.contact-box{
    max-width:700px;
    margin:60px auto;
    background:white;
    padding:30px;
    border-radius:16px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
}

.contact-title{
    font-weight:800;
    text-align:center;
    margin-bottom:20px;
}

.form-control{
    border-radius:10px;
    padding:12px;
}

.btn-send{
    background:#38bdf8;
    border:none;
    padding:12px;
    font-weight:600;
    border-radius:10px;
}

.btn-send:hover{
    background:#0ea5e9;
    color:white;
}

</style>

<div class="contact-box">

    <h2 class="contact-title">📩 Me contacter</h2>

    <form method="POST" action="send_mail.php">

        <input type="text" name="name"
		       class="form-control mb-3"
		       placeholder="Nom complet"
		       pattern="[A-Za-zÀ-ÿ\s]+"
		       title="Veuillez entrer uniquement des lettres"
		       required>

        <input type="email" name="email"
		       class="form-control mb-3"
		       placeholder="herbyshawlouis@gmail.com"
		       value="herbyshawlouis@gmail.com"
		       readonly
		       required>

        <textarea name="message" class="form-control mb-3" rows="5" placeholder="Votre message" required></textarea>

        <button type="submit" class="btn btn-send w-100">Envoyer</button>

    </form>

</div>