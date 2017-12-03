<?php

function balance($string_input){
    $openings = ['[', '(', '{'];
    $closings = [']', ')', '}'];
    $opening_brackets = array();

    $string_len = strlen($string_input);
    for($i = 0; $i < $string_len; $i++){
        $char = $string_input[$i];

        if(array_search($char, $openings) > -1){

            array_push($opening_brackets, $char);
        }
        elseif(array_search($char, $closings) > -1){
            // expected should be the opening bracket of same position as the current character of the input_string
            $expected = $openings[array_search($char, $closings)];
            // if the opening brackets array is empty or the last character is not equal the expected,
            // the input_string is not balanced
            if (sizeof($opening_brackets) === 0 || (array_pop($opening_brackets) !== $expected)){
                return false;
            }
        }
        else{
            // ignore other kind of characters
            continue;
        }
    }

    // if it arrives here and the opening brackets array is empty,
    // the input_string is balanced

    return (sizeof($opening_brackets) === 0);
}

// check all input_strings if they are balanced
function check_brackets($string_input){
    if (balance($string_input)){
        echo '<script>
                document.getElementById("result").innerHTML = \'<div class="alert alert-success"> <strong>Congratulations!</strong> This piece of text is correctly balanced! </div>\';
              </script>';
    }
    else{
        echo '<script>
                document.getElementById("result").innerHTML = \'<div class="alert alert-danger"> <strong>Boooo!</strong> This piece of text is not correctly balanced!</div>\';
              </script>';
    }
}

