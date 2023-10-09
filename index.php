<?php

// ESERCIZIO DI CHECK PASSWORD
// DEVE CONTENERE ALMENO 8 CARATTERI;
// DEVE CONTENERE UNA LETTERA MAIUSCOLA;
// DEVE CONTENERE UN CARATTERE NUMERICO;
// DEVE CONTENERE ALMENO UN CARATTERE SPECIALE;
$checkLenght = false;
$checkUpperCase = false;
$checkNum = false;
$checkSpecial = false;
// DEVE CONTENERE ALMENO 8 CARATTERI;
// prima senza funzione
function checkLenght($string){
    if (strlen($string)>= 8) {
    return true;
    }
    return false;
}
// DEVE CONTENERE UNA LETTERA MAIUSCOLA;
// prima senza funzione, utilizziamo break
function checkUpper($string){
    for ($i=0; $i <strlen($string) ; $i++) { 
        if (ctype_upper($string[$i])) {
            return true;
        }
    }
    return false;
}
// DEVE CONTENERE UN CARATTERE NUMERICO;
// utilizziamo lo stesso di su
function checkNumber($string){
    for ($i=0; $i <strlen($string) ; $i++) { 
        if (is_numeric($string[$i])) {
        return true;
        }
    }
    return false;
}
// DEVE CONTENERE UN CARATTERE SPECIALE
// utilizziamo lo stesso di su
function checkSpecial($string){
    $special_chars = ["!", "@", "#", "$"];
    for ($i=0; $i < strlen($string) ; $i++) { 
        if (in_array($string[$i], $special_chars)) {
        return true;
        }
    }
    return false;
}
//CHECK FINALE
function checkPassword($string){
    $checkLenght = checkLenght($string);
    $checkUpper= checkUpper($string);
    $checkSpecial = checkSpecial($string);
    $checkNum = checkNumber($string);
    // if (!checkLenght($string)) {
    //     echo "La password deve essere lunga almeno 8 caratteri \n";
    // }
    // if (!checkUpper($string)) {
    //     echo "La password deve contenere una lettera maiuscola \n";
    // }
    // if (!checkSpecial($string)) {
    //     echo "La password deve contenere un carattere speciale \n";
    // }
    // if (!checkNumber($string)) {
    //     echo "La password deve contenere un numero \n";
    // }
    return $checkLenght && $checkNum && $checkSpecial && $checkUpper;
}
//sfrutto le funzioni per mostrare in console che requisiti non sono soddisfatti e per richiederne l'inserimento finché i requisiti non sono soddisfatti
do {
    $password = readline("Inserisci una password: ");
    if (!checkLenght($password)) {
        echo "La password deve essere lunga almeno 8 caratteri \n";
    }
    if (!checkUpper($password)) {
        echo "La password deve contenere una lettera maiuscola \n";
    }
    if (!checkSpecial($password)) {
        echo "La password deve contenere un carattere speciale \n";
    }
    if (!checkNumber($password)) {
        echo "La password deve contenere un numero \n";
    }
} while (!checkPassword($password));

