<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Redirect;

class AulaService
{

    public function __construct()
    {
        $this->host = 'http://localhost:8001';
    }

    public function getPessoas()
    {
        $response = Http::get($this->host . '/api/pessoas')->collect();

        return $response;
    }

    public function createPessoas($request)
    {
        $json = [
            "email" => $request['email'],
            "telefone" => $request['telefone'],
            "id" => $request['id'],
            "cpf" => $request['cpf'],
            "nome" => $request['nome']
        ];

        $response = Http::post($this->host . '/api/pessoa', $json);
        return $response;
    }
}
