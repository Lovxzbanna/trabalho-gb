<?php include 'header.php'; ?> <!-- Incluindo o cabeçalho PHP -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre - CemFreelas</title>
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

        /* Texto sobre o site */
        .about-text {
            font-size: 18px;
            line-height: 1.6;
            margin-top: 20px;
        }

        .about-text p {
            margin-bottom: 20px;
        }

        .about-text a {
            color: #6A4C9C;
            text-decoration: none;
        }

        .about-text a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>

    <!-- Conteúdo Principal -->
    <div class="container">
        <h2>Sobre o CemFreelas</h2>
        <p>O <b>CemFreelas</b> é uma plataforma criada para conectar freelancers com empresas e indivíduos que buscam serviços de alta qualidade de maneira rápida e prática. Nosso objetivo é facilitar a contratação e oferecer um espaço seguro e eficiente para que ambos os lados possam negociar, colaborar e crescer.</p>

        <div class="about-text">
            <h3>Missão</h3>
            <p>A missão do CemFreelas é proporcionar uma experiência fluida e sem complicações para quem precisa de serviços de freelancers especializados. Buscamos transformar o mercado de trabalho, conectando profissionais de diversas áreas a projetos inovadores, com total transparência e segurança para todas as partes envolvidas.</p>

            <h3>Visão</h3>
            <p>Nosso desejo é nos tornar a principal plataforma de freelancers no Brasil, sendo reconhecidos pela qualidade dos serviços oferecidos e pela confiança de nossos usuários. Trabalhamos para ser a ponte entre talentos excepcionais e clientes que buscam soluções criativas para seus negócios.</p>

            <h3>Como Funciona?</h3>
            <p>Se você é freelancer, pode criar um perfil e começar a se candidatar a projetos de empresas que buscam suas habilidades. Se você é uma empresa ou indivíduo em busca de serviços, basta publicar um projeto e escolher o freelancer que melhor se adequa às suas necessidades. O CemFreelas facilita todo o processo de negociação e pagamento, proporcionando segurança para ambos os lados.</p>

            <h3>Benefícios para Freelancers</h3>
            <ul>
                <li>Acesso a uma vasta gama de projetos de diferentes áreas.</li>
                <li>Plataforma fácil de usar, com ferramentas que ajudam na gestão de suas propostas.</li>
                <li>Segurança no pagamento, com garantia de que os acordos serão cumpridos.</li>
                <li>Visibilidade e oportunidades de crescer como profissional.</li>
            </ul>

            <h3>Benefícios para Clientes</h3>
            <ul>
                <li>Encontre profissionais qualificados para seu projeto de forma rápida.</li>
                <li>Negocie diretamente com os freelancers, ajustando os detalhes de seu projeto.</li>
                <li>Tenha segurança nos pagamentos, com a garantia de que o trabalho será entregue conforme combinado.</li>
                <li>Receba serviços de alta qualidade de freelancers especializados em diversas áreas.</li>
            </ul>

            <p>Quer saber mais ou tirar dúvidas? <a href="contato.php">Entre em contato conosco!</a></p>
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
