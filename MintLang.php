<?php
/** Evaluates string $x to a value. */
function evaluate($x) {
    if (gettype($x) !== "string") {
        echo "Not a string.<br />";
        return $x;
    }
    $Q = "\"";
    if (startsWith($x, $Q) && endsWith($x, $Q)) {
        echo "STRING<br />";
        return substr($x, 1, -1);
    } elseif (!contains($x, ".")) {
        echo "INTEGER<br />";
        return intval($x);
    }
    echo "FLOATING-POINT<br />";
    return floatval($x);
}

/*** BEGIN LIBRARY DECLARATIONS ***/
function startsWith($haystack, $needle) {
    return !strncmp($haystack, $needle, strlen($needle));
}

function contains($haystack, $needle) {
    return strstr($haystack, $needle) !== FALSE;
}

function endsWith($haystack, $needle) {
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }
    return (substr($haystack, -$length) === $needle);
}

class Expression {
    public $operator = "NONE";
    /** The first argument to the operator. Can be a string or Expression. */
    public $operand0 = "null";
    /** The second argument to the operator. Can be a string or Expression. */
    public $operand1 = "null";
    
    public function __construct($fxn, $arg, $arg2) {
        $this->$operator = $fxn;
        $this->$operand0 = $arg;
        $this->$operand1 = $arg2;
    }
    
    public function evaluate() {
        if (gettype($this->$operand0) !== "string") {
            $this->operand0 = $this->operand0->evaluate();
        }
        if (gettype($this->$operand0) !== "string") {
            $this->operand0 = $this->operand0->evaluate();
        }
        if ($this->$operator === "+") {
            // TODO : Allow for concatenation of strings by using + (plus).
            return strval(evaluate($this->operand0) + evaluate($this->operand1));
        } elseif ($this->$operator === "-") {
            return strval(evaluate($this->operand0) - evaluate($this->operand1));
        } elseif ($this->$operator === "*") {
            return strval(evaluate($this->operand0) * evaluate($this->operand1));
        } elseif ($this->$operator === "/") {
            return strval(floatval(evaluate($this->operand0)) / floatval(evaluate($this->operand1)));
        }
    }
}
/***  END LIBRARY DECLARATIONS ***/

/***   CONSTANTS   ***/
$PRINT = "print ";
$NIL = "";
/*** END CONSTANTS ***/

$code = array("print 3434543345983475349573495834759347598347539458734957349534875935879534875395");
foreach ($code as $line) {
    if (startsWith($line, $PRINT)) {
        echo strval(evaluate(str_replace($PRINT, $NIL, $line)));
    }
}


?>
