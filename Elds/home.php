<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/home.css">
</head>
<body>
    <nav class="navBar">
        <img src="./img/logoElds.png" alt="" class="logo">
        <div class="bot">
            <a href="./home.php" class="link">
                Home
                <div class="li"></div>
            </a>
            <a href="#contatos" class="link">
                Contatos
                <div class="li"></div>
            </a>
            <a href="cards.php" class="link">
                Produtos
                <div class="li"></div>
            </a>
        </div>
        <?php if(!isset($_SESSION['cliente'])): ?>
        <div class="cliente">
            <a href="./login.php" class="link">
                Entrar
                <div class="li"></div>
            </a>
            <div class="bot2">
                <a href="./cadastro.php" class="link">
                    Cadastrar
                </a>
            </div>
        </div>
        <?php else:?>
            <div class="cliente">
                <p><?= $_SESSION['cliente']?></p>
                <a href="perfil.php"><img class="teste" src="<?php echo $_SESSION['foto_cliente']; ?>" alt="123"></a>
            </div>
        <?php endif?>
    </nav>
    <main class="corpo">
        <div class="ladoL"></div>
        <div class="ladoR"></div>
        <div class="ladoL1"></div>
        <div class="ladoR1"></div>

        <div class="carrosel">
            <div class="imagens">
                <input type="radio" name="a" id="rd1">
                <input type="radio" name="a" id="rd2">
                <input type="radio" name="a" id="rd3">

                <div class="img on">
                    <img src="./img/Salão2.jpg" alt="img1">
                </div>
                <div class="img">
                    <img src="./img/Casamento2.jpg" alt="img2">
                </div>
                <div class="img">
                    <img src="./img/Show.jpg" alt="img3">
                </div>

                <div class="trocar">
                    <div class="posi-1">
                        <p class="titulo-1">.Baile de formatura</p>
                        <p class="titulo-2">.Casamento Sr. e Sra. Fritz</p>
                        <p class="titulo-3">.Show dos dragões metálicos</p>
                    </div>
                    <div class="posi-2">
                        <textarea name="text" class="txt" id="txt1">  Baile de formatura escola nostradamus de 2022 com a presença de vossa agatha volkman</textarea>
                        <textarea name="text" class="txt" id="txt2">  Cenas antes do casamento de Thiago Fritz e Elizabeth Weber 30/04/2022</textarea>
                        <textarea name="text" class="txt" id="txt3">  Show apresentado no rock in rio no ano de 2018 pelos dragões metálicos</textarea>
                    </div>
                </div>
                <div class="troca-manual">
                    <div class="posi">
                        <label for="rd1" id="one" class="btn-m"></label>
                        <label for="rd2" id="two" class="btn-m"></label>
                        <label for="rd3" id="trhee" class="btn-m"></label>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="info">
        <div class="preto"></div>
        
        <div id="campo1">
            <p class="titulo-sobre">Sobre Elds Events:</p>
            <p class="sobre">
                    Na Elds, acreditamos que todo evento merece um cenário à altura. Somos uma empresa especializada no aluguel de espaços versáteis,
                elegantes e bem localizados para os mais diversos tipos de eventos de festas íntimas a grandes celebrações corporativas.
                Nosso compromisso é transformar cada ocasião em uma experiência memorável.
            </p>
        </div>
        <div id="campo2">
            <img class="edifi" src="./img/Elds-edificio.png" alt="img edifi">
        </div>
        <div id="campo3">
            <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2985.3973037476285!2d100.16114141706501!3d49.63601063544405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5d0cd5cb259cba45%3A0xaad10493bc08f807!2sGreenGold%20hotel%20and%20restaurant!5e0!3m2!1spt-PT!2sbr!4v1747168353885!5m2!1spt-PT!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div id="campo4">
            <p class="localização">Local:</p>
            <p class="info-rua">Endereço: Rua dawnton da silva, 219</p>
            <p class="info-rua">País: Polonia</p>
            <p class="info-rua">Referencia: Perto da ponte q caiu</p>
        </div>
    </div>
    <footer class="foot">
        <div class="parcerias">    
            <p class="titulos">Parcerias</p>
            <p>.Aqua Dev</p>
            <p>.Santandrer</p>
            <p>.Wayne Enterprise</p>
        </div>
        <div class="contatos" id="contatos">    
            <p class="titulos">Contatos</p>
            <p>(11)12345-6789</p>
            <p>(11)98765-4321</p>
            <p>eldsevents@yahoo.com.usa</p>
        </div>
        <div class="redes">    
            <p class="titulos">Redes Socias</p>
            <p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="M10 1.2A8.8 8.8 0 0 0 1.2 10A8.8 8.8 0 1 0 10 1.2m3.478 13.302c-.173 0-.294-.066-.421-.143c-1.189-.721-2.662-1.099-4.258-1.099c-.814 0-1.693.097-2.61.285l-.112.028c-.116.028-.235.059-.326.059a.65.65 0 0 1-.661-.656c0-.373.21-.637.562-.703a14 14 0 0 1 3.152-.372c1.855 0 3.513.43 4.931 1.279c.243.142.396.306.396.668a.655.655 0 0 1-.653.654m.913-2.561c-.207 0-.343-.079-.463-.149c-2.143-1.271-5.333-1.693-7.961-.993l-.12.037c-.099.031-.191.062-.321.062a.786.786 0 0 1-.783-.788c0-.419.219-.712.614-.824c1.013-.278 1.964-.462 3.333-.462c2.212 0 4.357.555 6.038 1.561c.306.175.445.414.445.771a.784.784 0 0 1-.782.785m1.036-2.92c-.195 0-.315-.047-.495-.144c-1.453-.872-3.72-1.391-6.069-1.391c-1.224 0-2.336.135-3.306.397l-.098.027a1.3 1.3 0 0 1-.365.068a.914.914 0 0 1-.919-.929c0-.453.254-.799.68-.925c1.171-.346 2.519-.521 4.006-.521c2.678 0 5.226.595 6.991 1.631c.332.189.495.475.495.872a.91.91 0 0 1-.92.915"/></svg>
                Fórro Elds
            </p>
            <p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="M17 1H3c-1.1 0-2 .9-2 2v14c0 1.101.9 2 2 2h14c1.1 0 2-.899 2-2V3c0-1.1-.9-2-2-2M9.984 15.523a5.54 5.54 0 0 0 5.538-5.539c0-.338-.043-.664-.103-.984H17v7.216a.69.69 0 0 1-.693.69H3.693a.69.69 0 0 1-.693-.69V9h1.549c-.061.32-.104.646-.104.984a5.54 5.54 0 0 0 5.539 5.539M6.523 9.984a3.461 3.461 0 1 1 6.922 0a3.461 3.461 0 0 1-6.922 0M16.307 6h-1.615A.694.694 0 0 1 14 5.308V3.691c0-.382.31-.691.691-.691h1.615c.384 0 .694.309.694.691v1.616c0 .381-.31.693-.693.693"/></svg>
                @elds_events
            </p>
            <p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="M17 1H3c-1.1 0-2 .9-2 2v14c0 1.101.9 2 2 2h7v-7H8V9.525h2v-2.05c0-2.164 1.212-3.684 3.766-3.684l1.803.002v2.605h-1.197c-.994 0-1.372.746-1.372 1.438v1.69h2.568L15 12h-2v7h4c1.1 0 2-.899 2-2V3c0-1.1-.9-2-2-2"/></svg>
                Elds Events
            </p>
        </div>
        <hr>
        <div class="copy">&copy; 2025 Elds Events</div>
    </footer>
    <script src="./js/script.js"></script>
</body>
</html>