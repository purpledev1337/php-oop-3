<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div>

        <h1>Esercizio in classe:</h1><hr>

        <?php

            /**
             * 
             *      Definire classe User:
             *          ATTRIBUTI (private):
             *          - username 
             *          - password
             *          - age
             *          
             *          METODI:
             *          - costruttore che accetta username, e password
             *          - proprieta' getter/setter
             *          - printMe: che stampa se stesso
             *          - toString: "username: age [password]"
             * 
             *          ECCEZIONI:
             *          - scatenare eccezione quando username e' minore di 3 caratteri o maggiore di 16
             *          - scatenare eccezione se password non contiene un carattere speciale (non alpha-numerico)
             *          - scatenare eccezione se age non e' un numero
             * 
             *          NOTE:
             *          - per testare il singolo carattere di una stringa
             * 
             *              $pws = "hello_mondo";
             *              $pwsArr = str_split($pws);
             *              for ($x=0;$x<count($pwsArr);$x++) {

             *                 $pwsChar = $pwsArr[$x];
             *                 echo $pwsChar . "<br>";
             *              }
             * 
             *      Testare la classe appena definita con dati corretti e NON corretti all'interno di un
             *      try-catch e eventualmente informare l'utente del problema
             * 
            */

            class User {

                private $username;
                private $password;
                private $age;

                public function __construct($username, $password) {

                    $this -> setName($username);
                    $this -> setPassword($password);
                }

                public function setName($username) {

                    $usernameArr = str_split($username);

                    if (count($usernameArr) < 3 | count($usernameArr) > 16) {

                        throw new Exception("Username's chars must be at least 3 and can't exceed 16");
                    }

                    $this -> username = $username;
                }

                public function getName() {

                    return $this -> username;
                }

                public function setPassword($password) {

                    if (ctype_alnum($password)) {

                        throw new Exception("Password must contain at least a special char( .  , !  -  _  / )");
                    }

                    $this -> password = $password;
                }

                public function getPassword() {

                    return $this -> password;
                }

                public function setAge($age) {

                    if (!is_numeric($age)) {

                        throw new Exception("Age must be a number!");
                    }

                    $this -> age = $age;
                }

                public function getAge() {

                    return $this -> age;
                }

                public function printUser() {

                    echo $this -> __toString();
                }

                public function __toString() {
                    
                    return "<h1>" . $this -> getName() . ": "
                        . $this -> getAge() . " ["
                        . $this -> getPassword() . "]</h1>";
                }
            }

            try {
        
                $u1 = new User("user1", ".pass1");
                $u1 -> setAge(21);
                $u1 -> printUser();
                $u2 = new User("user2", "-pass2");
                $u2 -> setAge(65);
                $u2 -> printUser();
                $u3 = new User("userinfinitenameyolo", "!pass3");
                $u3 -> setAge(35);
                $u3 -> printUser();
        
            } catch (Exception $e) {
        
                echo "<h3>" . $e -> getMessage() . "</h3>";
            }

            try {
        
                $u4 = new User("us", "/pass4");
                $u4 -> setAge(21);
                $u4 -> printUser();
        
            } catch (Exception $e) {
        
                echo "<h3>" . $e -> getMessage() . "</h3>";
            }

            try {
        
                $u5 = new User("user5", ".pass5");
                $u5 -> setAge("ciao");
                $u5 -> printUser();
        
            } catch (Exception $e) {
        
                echo "<h3>" . $e -> getMessage() . "</h3>";
            }

            try {
        
                $u6 = new User("user6", "pass12345");
                $u6 -> setAge(21);
                $u6 -> printUser();
        
            } catch (Exception $e) {
        
                echo "<h3>" . $e -> getMessage() . "</h3>";
            }

        ?>

        <hr><h1>Esercizio a casa:</h1><hr>
        <?php

        ?>


    </div>

<style>
    /* * {
        font-size: 1.5em;
    } */

</style>
    
</body>
</html>