<?php

function inputs($data){
    $data = trim($data);
    $data = strtolower($data);
    
    return htmlspecialchars($data);
  }