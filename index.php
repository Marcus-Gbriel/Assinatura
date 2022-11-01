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
    <section>
        <p>Faça Upload de imagens .jpg</p>    
    </section>
    <section>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="labelnome">Imagem:</label>
            <input type="file" name="pic" accept="image/*"><br>

            <button type="submit">Enviar imagem</button>
        </form><br>
        <form action="./criarimagem.php" method="get">
            <label for="labelnome">Nome:</label>
            <input type="text" name="nome" id="nome" ng-model="nome" placeholder="Nome"><br>

            <label for="labelnome">Sobrenome:</label>
            <input type="text" name="sobrenome" id="sobrenome" ng-model="sobrenome" placeholder="Sobrenome"><br>

            <label for="labelnome">Setor:</label>
            <select name="setor" id="setor" ng-model="setor">
                <option value=""></option>
                <option value="adm">ADM</option>
                <option value="vendas">Vendas</option>
                <option value="financeiro">Financeiro</option>
                <option value="operacional">Operacional</option>
                <option value="ti">T.I</option>
                <option value="telemarketing">Telemarketing</option>
            </select><br>

            <label for="labelnome">Cargo:</label>
            <input type="text" name="cargo" id="cargo" ng-model="cargo" placeholder="Cargo"><br>

            <label for="labelnome">E-mail:</label>
            <input type="email" name="email" id="email" ng-model="email" placeholder="E-mail"><br>

            <label for="labelnome">Ramal:</label>
            <input type="tel" name="ramal" id="ramal" ng-model="ramal" placeholder="0000"><br>

            <label for="labelnome">Celular:</label>
            <input type="tel" name="celular" id="celular" ng-model="celular" placeholder="00000-0000"><br>

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
                    $new_name = 'perfil' .$ext; //Definindo um novo nome para o arquivo
                    $dir = './imagens/'; //Diretório para uploads
                    move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
                    echo '<img src="./imagens/' . $new_name . '" class="img img-responsive img-thumbnail" width="200"><br>
                        Imagem enviada com sucesso!';
                }
            ?><br>
            <input type="submit" value="Gerar Assinatura">
        </form>
    </section>

</body>
</html>