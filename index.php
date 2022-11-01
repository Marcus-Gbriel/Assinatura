<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./_css/main.css">
    <title>Assinatura</title>
</head>
<body>
    <section class="menu">
        <a href="../"><img src="./imagens/logo_damata.png"></a>
    </section>
    <section class="secao">
        <form action="" method="post" enctype="multipart/form-data" class="form">
            <p>Faça Upload de imagens .jpg</p> 
            <label for="labelnome">Imagem:</label>
            <input type="file" name="pic" accept="image/*">

            <button type="submit">Enviar imagem</button>
        </form>
        <form action="./criarimagem.php" method="get" class="form">
            <label for="labelnome">Nome:</label>
            <input type="text" name="nome" id="nome" ng-model="nome" placeholder="Nome">

            <label for="labelnome">Sobrenome:</label>
            <input type="text" name="sobrenome" id="sobrenome" ng-model="sobrenome" placeholder="Sobrenome">

            <label for="labelnome">Setor:</label>
            <select name="setor" id="setor" ng-model="setor">
                <option value=""></option>
                <option value="ti">T.I</option>
                <option value="adm">ADM</option>
                <option value="vendas">Vendas</option>
                <option value="financeiro">Financeiro</option>
                <option value="operacional">Operacional</option>
                <option value="telemarketing">Telemarketing</option>
            </select>

            <label for="labelnome">Cargo:</label>
            <input type="text" name="cargo" id="cargo" ng-model="cargo" placeholder="Cargo">

            <label for="labelnome">E-mail:</label>
            <input type="email" name="email" id="email" ng-model="email" placeholder="E-mail">

            <label for="labelnome">Ramal:</label>
            <input type="tel" name="ramal" id="ramal" ng-model="ramal" placeholder="0000">

            <label for="labelnome">Celular:</label>
            <input type="tel" name="celular" id="celular" ng-model="celular" placeholder="00000-0000">

            <label for="labelnome">Local:</label>
            <select name="local" id="local" ng-model="local">
                <option value=""></option>
                <option value="matriz">Matriz</option>
                <option value="filial">Filial</option>
                <option value="muriae">Muriaé</option>
                <option value="uba">Ubá</option>
            </select><br>
            <?php
                if(isset($_FILES['pic'])) {
                    $ext = strtolower(substr($_FILES['pic']['name'],-4)); //Pegando extensão do arquivo
                    $new_name = 'perfil.jpg'; //Definindo um novo nome para o arquivo
                    $dir = './imagens/'; //Diretório para uploads
                    move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
                    echo '<img src="./imagens/' . $new_name . '" class="img img-responsive img-thumbnail" width="200"><br>
                        Imagem enviada com sucesso!';
                }
            ?>
            <input type="submit" value="Gerar Assinatura">
        </form>
    </section>

</body>
</html>