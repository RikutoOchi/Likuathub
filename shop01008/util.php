<?php
  // エスケープ処理用の関数を定義

/*  if( ! function_exists('h') ) {
    function h($data) {
        echo htmlspecialchars($data, ENT_QUOTES, "UTF-8");
        }
    }
  */
  function h($data){
    return htmlspecialchars($data, ENT_QUOTES, "UTF-8");
  }
  