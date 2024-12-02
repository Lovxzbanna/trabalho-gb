<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel - CemFreelas</title>
    <link rel="stylesheet" href="../public/style.css">
    <style>
        /* Estilo Global */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #4A76A8, #6A4C9C, #D8A6D1); /* Gradiente azul, roxo e rosa */
            color: #fff;
            font-size: 16px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1, h2, h3 {
            font-weight: bold;
            color: #fff; 
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            color: #e0e0e0; 
        }

        a {
            color: #f1f1f1;
            text-decoration: none;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            object-fit: cover;
        }

        /* Barra de Pesquisa */
        .search-bar {
            background-color: rgba(255, 255, 255, 0.2); 
            padding: 15px 20px;
            border-radius: 10px;
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); 
        }

        .search-bar .search-form {
            display: flex;
            align-items: center;
            width: 100%;
            max-width: 900px;
        }

        .search-bar input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            margin-right: 10px;
            background-color: #fff;
            color: #333;
            transition: border-color 0.3s ease;
        }

        .search-bar input:focus {
            outline: none;
            border-color: #6a11cb;
        }

        .search-bar button {
            padding: 12px 20px;
            background-color: #6a11cb;
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s ease-in-out;
        }

        .search-bar button:hover {
            background-color: #8a2be2;
            transform: scale(1.05);
        }

        .search-bar button:active {
            background-color: #7a1bbf;
            transform: scale(1);
        }

        /* Seção de boas-vindas */
        .welcome-section {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        .welcome-section .profile-pic {
            width: 80px; /* Ajustado para a imagem de perfil */
            height: 80px;
            border-radius: 50%;
            margin-right: 20px;
            border: 2px solid #fff;
        }

        /* Como Funciona */
        .how-it-works {
            text-align: center;
            margin-top: 30px;
        }

        .steps {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 20px;
        }

        .step {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .how-it-works .steps img {
            width: 80px; /* Ajustado para as imagens das etapas */
            height: 80px;
        }

        /* Depoimentos */
        .testimonials {
            margin-top: 40px;
        }

        .testimonial {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            margin-top: 20px;
            display: flex;
            align-items: center;
            border-radius: 10px;
        }

        .testimonial img {
            width: 80px; /* Ajuste para as imagens dos depoimentos */
            height: 80px;
            border-radius: 50%;
            margin-right: 20px;
            border: 2px solid #fff;
        }

        blockquote {
            font-size: 18px;
            font-style: italic;
            margin: 0;
        }

        cite {
            font-size: 14px;
            color: #ddd;
        }

        /* Seção de Serviços */
        .services {
            margin-top: 40px;
            display: flex; /* Usando Flexbox para colocar as imagens lado a lado */
            justify-content: space-between; /* Distribuindo o espaço entre os serviços */
            gap: 15px; /* Reduzi o gap entre os serviços */
            flex-wrap: wrap; /* Garante que os serviços se ajustem em telas menores */
        }

        .service {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            width: 23%; /* Cada serviço ocupará 23% da largura disponível */
            box-sizing: border-box;
            transition: transform 0.3s ease-in-out; /* Transição suave */
        }

        .service:hover {
            transform: translateY(-5px); /* Efeito de hover */
        }

        .service img {
            width: 100px; /* Ajustado para a largura das imagens */
            height: 100px; /* Ajustado para a altura das imagens */
            margin-bottom: 10px; /* Diminui o espaço entre a imagem e o texto */
            border-radius: 8px;
        }

        .service h3 {
            margin-top: 10px;
            color: #fff;
        }

        .service p {
            color: #e0e0e0;
        }

        /* Responsividade para dispositivos móveis */
        @media (max-width: 1024px) {
            .service {
                width: 48%; /* Ajuste para 2 colunas em telas médias */
            }
        }

        @media (max-width: 768px) {
            .services {
                flex-direction: column;
                align-items: center; /* Centraliza os serviços */
            }

            .service {
                width: 80%; /* Cada serviço ocupará 80% da largura da tela */
                margin-bottom: 20px; /* Reduz o espaçamento entre os serviços */
            }
        }

        /* Seção Fale Conosco */
        .contact {
            margin-top: 40px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .contact h2 {
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
        }

        .contact form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .contact input, .contact textarea {
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            background-color: #fff;
            color: #333;
            width: 100%;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        .contact input:focus, .contact textarea:focus {
            outline: none;
            border-color: #6a11cb;
        }

        .contact textarea {
            resize: vertical; /* Permite redimensionamento vertical da textarea */
            min-height: 150px; /* Altura mínima */
        }

        .contact button {
            padding: 14px;
            background-color: #6a11cb;
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s ease-in-out;
        }

        .contact button:hover {
            background-color: #8a2be2;
            transform: scale(1.05);
        }

        .contact button:active {
            background-color: #7a1bbf;
            transform: scale(1);
        }

        @media (max-width: 768px) {
            .contact form {
                align-items: center;
            }

            .contact input, .contact textarea {
                width: 90%; /* Ajuste para o formulário ocupar mais largura */
            }
        }
    </style>
</head>
<body>
<main class="main-content">
    <div class="container">
        <!-- Barra de Pesquisa -->
        

        <!-- Seção de boas-vindas -->
        <section class="welcome-section">
            <img src="projetos/fotoperfil.png" alt="Foto de Perfil" class="profile-pic">
            <div>
                <h1>Bem-vindo(a), visitante!</h1>
                <p>Explorar projetos e conectar-se com freelancers criativos e especializados.</p>
            </div>
        </section>

        <!-- Como Funciona -->
        <section class="how-it-works">
            <h2>Como Funciona</h2>
            <div class="steps">
                <div class="step">
                    <img src="projetos/cadastre-se.png" alt="Cadastro">
                    <h3>Cadastre-se</h3>
                    <p>Crie seu perfil, adicione detalhes e prepare-se para o sucesso.</p>
                </div>
                <div class="step">
                    <img src="projetos/encontre.webp" alt="Encontre">
                    <h3>Encontre</h3>
                    <p>Explore freelancers qualificados ou encontre projetos ideais para você.</p>
                </div>
                <div class="step">
                    <img src="projetos/selecione.avif" alt="Contrate">
                    <h3>Contrate</h3>
                    <p>Negocie, alinhe expectativas e comece a transformar ideias em realidade.</p>
                </div>
                <div class="step">
                    <img src="projetos/pagando.avif" alt="Pagamento">
                    <h3>Pagamento Seguro</h3>
                    <p>Garanta transações seguras e tranquilidade para ambas as partes.</p>
                </div>
            </div>
        </section>

        <!-- Depoimentos -->
        <section class="testimonials">
            <h2>O que dizem nossos usuários</h2>
            <div class="testimonial">
                <img src="projetos/joao.png" alt="João">
                <blockquote>"CemFreelas me ajudou a encontrar profissionais incríveis que transformaram meu projeto em um sucesso absoluto!"</blockquote>
                <cite>— João Silva</cite>
            </div>
            <div class="testimonial">
                <img src="projetos/mulher.jpg" alt="Maria">
                <blockquote>"Minha experiência foi fantástica! Consegui encontrar um designer talentoso em apenas algumas horas."</blockquote>
                <cite>— Maria Oliveira</cite>
            </div>
        </section>

        <!-- Nossos Serviços -->
        <section class="services">
            <h2>Nossos Serviços</h2>
            <div class="service">
                <img src="projetos/design.webp" alt="Design Gráfico">
                <h3>Design Gráfico</h3>
                <p>Transforme sua marca com designs impressionantes, logotipos e materiais visuais.</p>
            </div>
            <div class="service">
                <img src="projetos/desenvolvimento-web.avif" alt="Desenvolvimento Web">
                <h3>Desenvolvimento Web</h3>
                <p>Criamos sites e aplicações personalizadas para o seu negócio.</p>
            </div>

            <div class="service">
                <img src="projetos/marketing.avif" alt="Edição de Vídeo">
                <h3>Edição de Vídeo</h3>
                <p>Edição criativa para vídeos promocionais, tutoriais e muito mais.</p>
            </div>
        </section>

        <!-- Fale Conosco -->
        <section class="contact">
            <h2>Fale Conosco</h2>
            <form action="mensagem.php" method="POST">
                <input type="text" name="nome" placeholder="Seu Nome" required>
                <input type="email" name="email" placeholder="Seu E-mail" required>
                <textarea name="mensagem" placeholder="Sua Mensagem" required></textarea>
                <button type="submit">Enviar</button>
            </form>
        </section>
    </div>
</main>
</body>
</html>
<?php include 'footer.php'; ?>   