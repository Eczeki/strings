<?php
/**
 * Removes a Case Sensitive Char $char from target String $string
 * 
 * @param Char $char
 * @param String $string
 * 
 * @return String
 * 
 */ 
function removeChar($char, $string) {
    if(strlen($char) != 1) return "";
    $upperLimit = strlen($string);
    $result = "";
    for($i = 0; $i < $upperLimit; $i++) {
        if($string[$i] != $char) {
            $result = $result.$string[$i];
        }
    }
    return $result;
}

/**
 * Reverses a String $string
 * 
 * @param String $string
 * 
 * @return String
 * 
 */ 
function reverse($string) {
    $result = "";
    $upperLimit = strlen($string);
    for($i = $upperLimit; $i > 0; $i--) {
        $result = $result.$string[$i];
    }
    return $result;
}

/**
 * Creates array of tokens from String $string 
 * using String $delim as delimiter
 * 
 * @param String $delim
 * @param String $string
 * 
 * @return Array
 * 
 */ 
function tokstr($delim, $string) {
    $result = array();
    $delimCount = 0;
    $delimMax = strlen($delim) - 1;
    $tokenIndex = 0;
    $upperLimit = strlen($string);
    $start = false;
    for($i = 0; $i < $upperLimit; $i++) {
        if($string[$i] == $delim[$delimCount]) {
            if($delimCount == $delimMax) {
                $tokenIndex++;
                $start = false;
            }
            else {
                $delimCount++;
            }
        }
        else {
            if(!$start) {
                //Init array as this is the first time we encounter it
                $result[$tokenIndex] = "";
                $start = true;
            }
            $result[$tokenIndex] = $result[$tokenIndex].$string[$i];
            $delimCount = 0;
        }
        
    }
    return $result;
}

/**
 * Receives a String $string and ciphers or deciphers it 
 * from or to a weak caesar cipher depending on whether
 * it receives true(cipher) or false(decipher) on $state.
 * Deciphering is not as fast.
 * 
 * @param String $string
 * @param Bool $state
 * 
 * @return String
 * 
 */ 
function caesarCipher($string, $state) {
    $alphabet = array('a' => 0, 'b' => 1, 'c' => 2, 'd' => 3, 'e' => 4,
                      'f' => 5, 'g' => 6, 'h' => 7, 'i' => 8, 'j' => 9, 
                      'k' => 10,'l' => 11,'m' => 12,'n' => 13,'o' => 14, 
                      'p' => 15,'q' => 16,'r' => 17,'s' => 18,'t' => 19, 
                      'u' => 20,'v' => 21,'w' => 22,'x' => 23,'y' => 24, 
                      'z' => 25);
                      
    $upperLimit = strlen($string);
    $result = "";
    for($i = 0; $i < $upperLimit; $i++) {
        if($state) {
            if($string[$i] != ' ')
                $result = $result.array_search($alphabet[$string[$i]] + 3, $alphabet);
            else
                $result = $result." ";
        }
        else {
            if($string[$i] != ' ')
                $result = $result.array_search($alphabet[$string[$i]] - 3, $alphabet);
            else
                $result = $result." ";
        }
    }
    return $result;
}

/**
 * Receives a String $string and returns the first Integer $num 
 * characters in the string.
 * 
 * @param String $string
 * @param Integer $num
 * 
 * @return String
 * 
 */ 
function getFirst($string, $num) {
    $upperLimit = strlen($string);
    /*Assume the whole string wants to be retrieved*/
    if($upperLimit < $num) return $string;
    $result = "";
    for($i = 0; $i < $num; $i++) 
        $result = $result.$string[$i];
    return $result;
}

/**
 * Receives a String $string and returns the last Integer $num 
 * characters in the string.
 * 
 * @param String $string
 * @param Integer $num
 * 
 * @return String
 * 
 */ 
function getLast($string, $num) {
    $upperLimit = strlen($string);
    /*Assume the whole string wants to be retrieved*/
    if($upperLimit < $num) return $string;
    $num = $upperLimit - ($num + 1);
    $result = "";
    for($i = $upperLimit - 1; $i > $num; $i--) 
        $result = $string[$i].$result;
    return $result;
}

/**
 * The same as str_shuffle.
 * 
 * @param String $string
 * 
 * @return String
 * 
 */ 
function getShuffle($string) {
    return str_shuffle($string);
}

/**
 * Removes spaces of String $string and replaces them
 * with '-' .
 * 
 * @param String $string
 * 
 * @return String
 * 
 */ 
function encode($string) {
    $upperLimit = strlen($string);
    for($i = 0; $i < $upperLimit; $i++) 
        if($string[$i] == ' ') $string[$i] = '-';
    return $string;    
    
}

/**
 * Removes '-' of String $string and replaces them
 * with spaces.
 * 
 * @param String $string
 * 
 * @return String
 * 
 */ 
function decode($string) {
    $upperLimit = strlen($string);
    for($i = 0; $i < $upperLimit; $i++) 
        if($string[$i] == '-') $string[$i] = ' ';
    return $string;  
}


    
?>
