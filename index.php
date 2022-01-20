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

        <h1>Esercizio mattina:</h1><hr>

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

        <hr><h1>Esercizio pomeriggio:</h1><hr>
        <?php

            /**
             *      
             *      Definire classe Computer:
             *          ATTRIBUTI:
             *          - codice univoco
             *          - modello
             *          - prezzo
             *          - marca
             * 
             *          METODI:
             *          - costruttore che accetta codice univoco e prezzo
             *          - proprieta' getter/setter per tutte le variabili d'istanza
             *          - printMe: che stampa se stesso (come quella vista a lezione)
             *          - toString: "marca modello: prezzo [codice univoco]"
             * 
             *          ECCEZIONI:
             *          - codice univoco: deve essere composto da esattamente 6 cifre (no altri caratteri)
             *          - marca e modello: devono essere costituiti da stringhe tra i 3 e i 20 caratteri
             *          - prezzo: deve essere un valore intero compreso tra 0 e 2000
             * 
             *      Testare la classe appena definita con tutte le casistiche interessanti per verificare
             *      il corretto funzionamento dell'algoritmo
            */

            class Computer {

                private $code;
                private $model;
                private $price;
                private $brand;

                public function __construct($code, $price) {

                    $this -> setCode($code);
                    $this -> setModel($price);
                }

                public function setCode($code) {

                    if (!is_numeric($code) | strlen($code) < 6 | strlen($code) > 6) {

                        throw new Exception("The universal code must be exactly 6 digits (only numbers)");
                    }

                    $this -> code = $code;
                }

                public function getCode() {

                    return $this -> code;
                }

                public function setModel($model) {

                    if (strlen($model) < 3 | strlen($model) > 20) {

                        throw new Exception("Model name must be shorter than 20 chars and longer than 3");
                    }

                    $this -> model = $model;
                }

                public function getModel() {

                    return $this -> model;
                }

                public function setBrand($brand) {

                    if (strlen($brand) < 3 | strlen($brand) > 20) {

                        throw new Exception("Brand name must be shorter than 20 chars and longer than 3");
                    }

                    $this -> brand = $brand;
                }

                public function getBrand() {

                    return $this -> brand;
                }

                public function setPrice($price) {

                    if (!is_int($price) | $price <= 0 | $price >= 2000) {

                        throw new Exception("Price must be an integer number between 0 and 2000");
                    }

                    $this -> price = $price;
                }

                public function getPrice() {

                    return $this -> price;
                }

                public function printComputer() {

                    echo $this -> __toString();
                }

                // *          - toString: "marca modello: prezzo [codice univoco]"
                public function __toString() {
                    
                    return "<h1>" . $this -> getBrand() . " " . $this -> getModel() . ": €"
                        . $this -> getPrice() . " ["
                        . $this -> getCode() . "]</h1>";
                }
            }

            try {
        
                $pc1 = new Computer("123456" , "Model1");
                $pc1 -> setBrand("Brand1");
                $pc1 -> setPrice(1130);
                $pc1 -> printComputer();
                $pc2 = new Computer("A8F654" , "Model2");
                $pc2 -> setBrand("Brand2");
                $pc2 -> setPrice(980);
                $pc2 -> printComputer();
        
            } catch (Exception $e) {
        
                echo "<h3>" . $e -> getMessage() . "</h3>";
            }

            try {
        
                $pc3 = new Computer("123456789", "Model3");
                $pc3 -> setBrand("Brand3");
                $pc3 -> setPrice(880);
                $pc3 -> printComputer();
        
            } catch (Exception $e) {
        
                echo "<h3>" . $e -> getMessage() . "</h3>";
            }

            try {
        
                $pc4 = new Computer("123456", "model4infinitenametotriggercontrol");
                $pc4 -> setBrand("Brand4");
                $pc4 -> setPrice(1580);
                $pc4 -> printComputer();
        
            } catch (Exception $e) {
        
                echo "<h3>" . $e -> getMessage() . "</h3>";
            }

            try {
        
                $pc5 = new Computer("321456", "Model5");
                $pc5 -> setBrand("Brand5");
                $pc5 -> setPrice(2500);
                $pc5 -> printComputer();
        
            } catch (Exception $e) {
        
                echo "<h3>" . $e -> getMessage() . "</h3>";
            }

            try {
        
                $pc6 = new Computer("654123", "Model6");
                $pc6 -> setBrand("Brand6");
                $pc6 -> setPrice("asd");
                $pc6 -> printComputer();
        
            } catch (Exception $e) {
        
                echo "<h3>" . $e -> getMessage() . "</h3>";
            }

            try {
        
                $pc7 = new Computer("341256", "Model7");
                $pc7 -> setBrand("Brand7");
                $pc7 -> setPrice("-1200");
                $pc7 -> printComputer();
        
            } catch (Exception $e) {
        
                echo "<h3>" . $e -> getMessage() . "</h3>";
            }
        ?>


    </div>

<style>

</style>
    
</body>
</html>