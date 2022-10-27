<?php
include 'connect.php'; //inclui os códigos do conect para o reg 
if(isset($_POST['sub'])){ //verifica se há alguma informação escrita (posso colocar o ! na frente de isset para "se não estiver preenchido")
    $t=$_POST['text']; //nesses campos eu coloco as informações que eu quero saber se estão preenchidas ou não 
    $u=$_POST['user'];
    $p=$_POST['pass'];
    $c=$_POST['city'];
    $g=$_POST['gen'];
    if($_FILES['f1']['name']){ //esse if verifica se houve upload de imagens 
    move_uploaded_file($_FILES['f1']['tmp_name'], "image/".$_FILES['f1']['name']); //se houver upload, ele associa o nome do arquivo e move o arquivo para a pasta que eu mandar dentro do servidor
    $img="image/".$_FILES['f1']['name']; //aqui eu mostro a pasta que eu quero que armazene a imagem 
    }
    $i="insert into reg(name,username,password,city,image,gender)value('$t','$u','$p','$c','$img','$g')"; //inserção das informações inseridas no formulário para o banco de dados
    mysqli_query($con, $i);
}
?>

<html> 
    <head><!--aqui eu faço o formulário de acordo com as informações que eu quero inserir no banco de dados-->
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        Name
                        <input type="text" name="text">
                    </td>
                </tr>
                <tr>
                    <td>
                        Username
                        <input type="text" name="user">
                    </td>
                </tr>
                <tr>
                    <td>
                        password
                        <input type="password" name="pass">
                    </td>
                </tr>
                <tr>
                    <td>
                        city
                        <select name="city">
                            <option value="">-select-</option>
                            <option value="knp">kanpur</option>
                            <option value="lko">lucknow</option>
                    </td>
                </tr>
                <tr>
                    <td>
                        Gender
                        <input type="radio"name="gen" id="gen" value="male">male
                        <input type="radio" name="gen" id="gen" value="female">female
                    </td>
                </tr>
                <tr>
                    <td>
                        Image
                        <input type="file" name="f1"> <!-- campo de html do tipo "file", para poder adicionar arquivos (f1)-->
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="submit" name="sub">
                               
                    </td>
                </tr>
            </table>
    </body>
</html>
