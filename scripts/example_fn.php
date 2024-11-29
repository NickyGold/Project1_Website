<?php

function example($title, $cat, $args = NULL){
    echo $title;
    echo $cat;

    if($args != NULL){
        try{
            if($args["href"] != NULL){
                echo $args["href"];
            }}
        catch(Exception $e){
            echo "a";
            echo $e->getMessage();
        }
        try{
            if($args["CreatedBy"] != NULL){
                echo $args["CreatedBy"];
            } else{echo "ags";}
        }catch(Exception $e){
            echo "a";
            echo $e->getMessage();
        }

    }else{
        echo "No Arguments";
    }
}

$myArguments["href"] = "www.theworldwideweb.com";
example("A Title","Category",$myArguments);