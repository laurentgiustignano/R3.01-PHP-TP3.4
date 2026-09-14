<?php

// Todo : A compléter pour retourner le résultat de l'opération

http_response_code(400);
echo json_encode([
    'status' => 'error',
    'message' => 'Il faut écrire des choses',
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);