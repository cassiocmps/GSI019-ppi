<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>PHP ex2</title>
</head>

<body>
    <?php 
        $produtos = ["cachorro","gato","boi","macaco","elefante","tubarao","onça","rinoceronte","girafa","cabra"];
        $descricoes = [
            "The dog or domestic dog is a domesticated descendant a ancient, extinct wolf.",
            "The cat is a domestic species of a small carnivorous mammal.",
            "Cattle are commonly raised as livestock for meat.",
            "Monkey is a common name that may refer to most mammals of the infraorder Simiiformes.",
            "Elephants are the largest existing land animals.",
            "Modern sharks are classified within the clade Selachimorpha and are the sister group to the rays.",
            "The jaguar is a large cat species and the only living member of the genus Panthera native to the Americas.",
            "Rhino is a member of any of the five extant species of odd-toed ungulates in the family Rhinocerotidae.",
            "The giraffe is a tall African mammal belonging to the genus Giraffa.",
            "The goat is a domesticated species of goat-antelope typically kept as livestock."
        ];
echo <<< tableheader
    <table class="table table-striped">
        <theader class="thead-dark">
        <tr>
            <th scope="col">cod</th>
            <th scope="col">Produto</th>
            <th scope="col">Descriçao</th>
        </tr>
        </thead
<tbody>
tableheader;

            $qde=(int)$_GET["qde"];
            for($i=1;$i<=$qde;$i++){
                $val = rand(0,9);
echo <<<tablerows
    <tr>
    <th scope = "row">$i</th>
    <td> $produtos[$val] </td>
    <td> $descricoes[$val] </td>
    </tr>

tablerows;
            };
echo <<<tablefoot
            </tbody>
            </table>
tablefoot;
    ?>
    </div>
</body>

</html>