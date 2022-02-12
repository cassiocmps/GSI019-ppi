<?php

    function carregaString($arquivo){
        $arq = fopen($arquivo, "r");
        $string = fgets($arq);
        fclose($arq);
        return $string;
    }

    $email = $_POST["email"];
    $senha = $_POST["password"];

    $emailAqr = htmlspecialchars(carregaString("../ex3/email.txt"));
    $senhaHashArq = htmlspecialchars(carregaString("../ex3/senhaHash.txt"));

    if ($email == $emailAqr && password_verify($senha, $senhaHashArq)) {
        header("location: success.php");
        exit();
    }
    else {
        header("location: index.html");
        exit();
    }
?>
