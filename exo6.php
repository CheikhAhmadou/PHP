
<fieldset>
    <form action="" method="get">

    <label for="val1">Valeur1:</label><br />

    <input type="text" id="val1" name="val1"><br /><br />

    <label for="selection">selectioner un opérateur: </label>
    <select name="selection">
        <option value="">--selection--</option>
        <option value="addition">+</option>
        <option value="soustraction">-</option>
        <option value="multiplication">*</option>
        <option value="division">/</option>
        <option value="modulo">%</option>
    </select><br /><br />
    

    <label for="val2">Valeur2:</label><br />
    <input type="text" id="val2" name="val2">

    <input type='submit' name='submit' value='calculer'><br />

    <label for="result">resultat:</label>


    <output type="number" id="result" name="result">


        <?php
        $operation= 0;
        if(isset($_GET['submit'],$_GET["val1"],$_GET["val2"] ,$_GET["selection"]) &&
            !empty($_GET['submit'])&& !empty($_GET["val1"]) && !empty($_GET["val2"]) && !empty($_GET["selection"])
        ){
            $v1 = $_GET["val1"];
            $v2 = $_GET["val2"];

            if(settype($v1,"integer") && settype($v2,"integer")){

                switch($_GET['selection']){
                    case "addition": 
                        $operation= $v1 + $v2;
                        break;
                    case "soustration":
                        $operation= $v1 - $v2;
                        break;
                    case "multiplication":
                        $operation= $v1 * $v2;
                        break;
                    case "division":
                        $operation= $v1/ $v2;
                        break;
                        case "modulo":
                            $operation= $v1 % $v2;
                            break;
                    }
                    echo $operation;
                }
            }
            ?>
            
        </output>
    
        </form>
    </fieldset>
