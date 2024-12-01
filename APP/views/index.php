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
            width: 100px;
            height: 100px;
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
            width: 100px;
            height: 100px;
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
            width: 100px;
            height: 100px;
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

        /* Responsividade para dispositivos móveis */
        @media (max-width: 768px) {
            .steps {
                flex-direction: column;
                align-items: center;
            }

            .step {
                width: 100%;
                margin-bottom: 20px;
            }

            .search-bar .search-form {
                flex-direction: column;
                width: 100%;
            }

            .search-bar button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
<main class="main-content">
    <div class="container">
        <!-- Barra de Pesquisa -->
        <section class="search-bar">
            <form action="pesquisa.php" method="GET" class="search-form">
                <input type="text" name="query" placeholder="Buscar por freelancers, projetos ou serviços..." required>
                <button type="submit">Buscar</button>
            </form>
        </section>

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
                <p>Construa sites dinâmicos e intuitivos para engajar seu público.</p>
            </div>
            <div class="service">
                <img src="projetos/redacao.jpg" alt="Redação">
                <h3>Redação e Conteúdo</h3>
                <p>Obtenha textos otimizados e criativos para atrair e informar seu público.</p>
            </div>
            <div class="service">
                <img src="projetos/marketing.avif" alt="Marketing Digital">
                <h3>Marketing Digital</h3>
                <p>Crie estratégias eficazes para aumentar sua visibilidade e alcançar resultados.</p>
            </div>
        </section>

        <!-- Contato -->
        <section class="contact">
            <h2>Fale Conosco</h2>
            <form action="mensagem.php" method="POST">
                <input type="text" name="nome" placeholder="Seu Nome" required>
                <input type="email" name="email" placeholder="Seu Email" required>
                <textarea name="mensagem" placeholder="Sua Mensagem" rows="5" required></textarea>
                <button type="submit">Enviar Mensagem</button>
            </form>
        </section>
    </div>
</main>

<script>
    document.querySelector("form").addEventListener("submit", function(event) {
        const nome = document.querySelector("input[name='nome']").value;
        const email = document.querySelector("input[name='email']").value;
        const mensagem = document.querySelector("textarea[name='mensagem']").value;

        // Depuração - Verificar os valores capturados
        console.log("Nome:", nome);
        console.log("Email:", email);
        console.log("Mensagem:", mensagem);

        // Verifica se algum campo está vazio
        if (!nome || !email || !mensagem) {
            event.preventDefault(); // Impede o envio do formulário
            alert("Por favor, preencha todos os campos.");
        }
    });
</script>

</body>
</html>
