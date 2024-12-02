<?php include 'header.php'; ?> <!-- Incluindo o cabeçalho PHP -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato - CemFreelas</title>
    <link rel="stylesheet" href="style.css">
    <!-- Link para ícones -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Reset de estilos padrões */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Corpo da Página */
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #4A76A8, #6A4C9C, #D8A6D1); /* Gradiente azul, roxo e rosa */
            color: #333;
            padding: 0;
            min-height: 100vh;
            margin-top: 0px;
        }

        /* Estilos de Navegação */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #6A4C9C;
            padding: 20px;
            color: white;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .nav-links a {
            margin: 0 10px;
            text-decoration: none;
            color: white;
            font-size: 18px;
        }

        .nav-links a:hover {
            color: #D8A6D1;
        }

        /* Container principal */
        .container {
            width: 100%;
            max-width: 1000px;
            margin: 40px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        /* Títulos */
        h2, h3 {
            color: #6A4C9C; /* Roxo para os títulos */
            margin-bottom: 20px;
            font-weight: bold;
        }

        h2 {
            font-size: 32px;
        }

        h3 {
            font-size: 28px;
        }

        /* Informações de Contato */
        .contact-info {
            margin-top: 30px;
        }

        .contact-info p {
            font-size: 18px;
        }

        .contact-info p a {
            color: #6A4C9C; /* Roxo para os links */
            text-decoration: none;
            font-weight: 500;
        }

        .contact-info p a:hover {
            text-decoration: underline;
        }

        /* Redes Sociais */
        .social-icons {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 30px;
        }

        .social-icons a {
            color: black; /* Preto para os links */
            font-size: 18px;
            margin: 10px;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .social-icons a:hover {
            color: #6A4C9C; /* Roxo ao passar o mouse */
        }
    </style>
</head>
<body>

    <!-- Conteúdo Principal -->
    <div class="container">
        <h2>Entre em Contato Conosco</h2>
        <p>Se tiver alguma dúvida ou precisar de mais informações, não hesite em nos contatar pelas formas abaixo.</p>

        <div class="contact-info">
            <h3>Informações de Contato</h3>
            <p>Você pode nos contatar pelo e-mail: <a href="mailto:contato@cemfreelas.com.br">contato@cemfreelas.com.br</a></p>
            <p>Ou pelo telefone: (11) 99999-9999</p>
        </div>

        <!-- Redes Sociais -->
        <div class="social-icons">
            <a href="https://www.facebook.com/cemfreelas" target="_blank" title="Facebook">
                <i class="fab fa-facebook-f"></i> Facebook: @cemfreelas
            </a>
            <a href="https://www.instagram.com/cemfreelas" target="_blank" title="Instagram">
                <i class="fab fa-instagram"></i> Instagram: @cemfreelas
            </a>
            <a href="https://www.linkedin.com/company/cemfreelas" target="_blank" title="LinkedIn">
                <i class="fab fa-linkedin-in"></i> LinkedIn: @cemfreelas
            </a>
            <a href="https://twitter.com/cemfreelas" target="_blank" title="Twitter">
                <i class="fab fa-twitter"></i> Twitter: @cemfreelas
            </a>
            <a href="https://wa.me/5511999999999" target="_blank" title="WhatsApp">
                <i class="fab fa-whatsapp"></i> WhatsApp: +55 11 99999-9999
            </a>
        </div>
    </div>

    <script>
        function toggleMenu() {
            const navLinks = document.querySelector('.nav-links');
            navLinks.classList.toggle('show');
        }
    </script>

<?php include 'footer.php'; ?>    

</body>
</html>
