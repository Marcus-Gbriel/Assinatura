<?php
//###
//Desenvolvido por Marcus Gabriel 01/11/2022.
//###

//Transformando proporção da imagem anexada!
        $filename = 'imagens/perfil.jpg';
        $width = 240;
        $height = 240;

    //Obtendo o tamanho original
        list($width_orig, $height_orig) = getimagesize($filename);

    //Calculando a proporção
        $ratio_orig = $width_orig/$height_orig;

        if ($width/$height > $ratio_orig) {
            $width = $height*$ratio_orig;
        } else {
            $height = $width/$ratio_orig;
        }

    //O resize propriamente dito. Na verdade, estamos gerando uma nova imagem.
        $image_p = imagecreatetruecolor($width, $height);
        $image = imagecreatefromjpeg($filename);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

    //Transformando imagem para nova.jpg
        imagejpeg($image_p, 'imagens/nova.jpg', 75);

//
//Começando a montar assinatura!
//
    //Recebendo imagens
        $imgresource = imagecreatefrompng("imagens/ass.png");
        $imgperf = imagecreatefromjpeg("imagens/nova.jpg");

    //Definindo a cor
        $textcolor = imagecolorallocate($imgresource, 0,0, 0);

    //Carregar fontes
        $fnormal = './font/arial.ttf';
        $fnegrito = './font/CALIBRIB.TTF';
        $fnegritoeitalico = './font/Calibri.ttf';

    //Criando variáeis
        //Iformações formulário
            $nome = urldecode( $_GET['nome']);
            $nomesize = "25";
            $sobrenome = urldecode( $_GET['sobrenome']);
            $sobrenomesize ="25";
            $cargo = urldecode( $_GET['cargo']);
            $cargosize = "12";
            $ramal = urldecode( $_GET['ramal']);
            $ramalsize = "13";
            $email = urldecode( $_GET['email']);
            $emailsize = "13";
            $local = urldecode( $_GET['local']);
            $localsize = "13";
            $celular = urldecode( $_GET['celular']);
            $celularsize = "13";
            $setor = urldecode( $_GET['setor']);
            $setorsize = "13";

        //Proporção imagem
            $perfilx = "240";
            $perfily = "240";
        
    //Tratamento de Informações
        //Localidade
            if ($local == "matriz") {
                $rua = "Rod BR-116 KM 765";
            } elseif ($local == "filial") {
                $rua = "Rua Gentil Pacheco de Melo, 28, Jardim Lisboa";
            } elseif ($local == "muriae") {
                $rua = "_Muriaé_";
            } elseif ($local == "uba") {
                $rua = "_Ubá_";
            } else {
                echo "NÃO PREENCHIDO";
            }
        //Setores
            if ($setor == "ti") {
                $fsetor = "T.I | Damata Bebidas";
            } elseif ($setor == "adm") {
                $fsetor = "ADM | Damata Bebidas";
            } elseif ($setor == "vendas") {
                $fsetor = "Vendas | Damata Bebidas";
            } elseif ($setor == "operacional") {
                $fsetor = "Operacional | Damata Bebidas";
            } elseif ($setor == "financeiro") {
                $fsetor = "Financeiro | Damata Bebidas";
            } elseif ($setor == "telemarketing") {
                $fsetor = "Telemarketing | Damata Bebidas";
            }
        //Cidade
            if ($local == "matriz") {
                $cidade = "Leopoldina - MG";
            } elseif ($local == "filial") {
                $cidade = "Leopoldina - MG";
            } elseif ($local == "muriae") {
                $cidade = "Muriaé - MG";
            } elseif ($local == "uba") {
                $cidade = "Ubá - MG";
            }
        //Contato
            $telefone = "+55 (32) 3449-4600 | Ramal ".$ramal;
            $celphone = "+55 (32) ".$celular;

    //Escreve na imagen
        imagettftext($imgresource, $nomesize, 0,270, 60, $textcolor,$fnegrito, $nome);
        imagettftext($imgresource, $sobrenomesize, 0,270, 90, $textcolor,$fnegrito, $sobrenome);
        imagettftext($imgresource, $cargosize, 0,270, 120, $textcolor,$fnormal, $cargo);
        imagettftext($imgresource, $setorsize, 0,270, 160, $textcolor,$fnormal, $fsetor);
        imagettftext($imgresource, $localsize, 0,270, 205, $textcolor,$fnormal, $celphone);
        imagettftext($imgresource, $ramalsize, 0,602, 55, $textcolor,$fnormal, $telefone);
        imagettftext($imgresource, $emailsize, 0,602, 95, $textcolor,$fnormal, $email);
        imagettftext($imgresource, $emailsize, 0,602, 135, $textcolor,$fnormal, 'www.damataleo.com.br');
        imagettftext($imgresource, $localsize, 0,602, 185, $textcolor,$fnormal, $rua);
        imagettftext($imgresource, $localsize, 0,602, 205, $textcolor,$fnormal, $cidade);
        
    //Carregando imagem de perfil
        imagecopymerge($imgresource,$imgperf,20,20,0,0,$perfilx,$perfily,100);

    //Header informando que é uma imagem JPEG
        header( 'Content-type: image/jpeg; charset=utf-8' );

    //Envia a imagem para o borwser ou arquivo
        imagejpeg( $imgresource, NULL, 80 );

    //Apagar imagem
        unlink('imagens/nova.jpg');
        unlink('imagens/perfil.jpg');
?>