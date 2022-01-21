<?php

namespace App\Class;

class Client {

    private string $url;
    private string $token;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function registration(string $login, string $password) {
        $data = json_encode(['login'=>$login, 'password'=>$password], JSON_UNESCAPED_UNICODE);
        $req = curl_init();
        curl_setopt_array($req, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $this->url.'/registration',
            CURLOPT_HTTPHEADER => array(
                'Content-type: application/json',
                'Content-Length'.strlen($data)),
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $data
        ));
        try {
            $data = curl_exec($req);
            $inf = curl_getinfo($req, CURLINFO_RESPONSE_CODE);
        } finally {
            curl_close($req);
        }
        return $inf;
    }

    public function createTodoList(string $login, string $list) {
        $data = json_encode(['login'=>$login, 'list'=>$list], JSON_UNESCAPED_UNICODE);
        $req = curl_init();
        curl_setopt_array($req, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $this->url.'/createTodo',
            CURLOPT_HTTPHEADER => array(
                'Content-type: application/json',
                'Content-Length'.strlen($data)),
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $data
        ));
        try {
            $data = curl_exec($req);
            $inf = curl_getinfo($req, CURLINFO_RESPONSE_CODE);
        } finally {
            curl_close($req);
        }
        return $inf;
    }

    public function deleteTodoList(int $id, string $login, string $password) {
        $data = json_encode(['login'=>$login, 'list'=>$password], JSON_UNESCAPED_UNICODE);
        $req = curl_init();
        curl_setopt_array($req, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $this->url.'/deleteTodo'.$id,
            CURLOPT_HTTPHEADER => array(
                'Content-type: application/json',
                'Content-Length'.strlen($data)),
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_POSTFIELDS => $data
        ));
        try {
            $data = curl_exec($req);
            $inf = curl_getinfo($req, CURLINFO_RESPONSE_CODE);
        } finally {
            curl_close($req);
        }
        return $inf;
    }

    public function editTodoList(int $id, string $login, string $list) {
        $data = json_encode(['login'=>$login, 'list'=>$list], JSON_UNESCAPED_UNICODE);
        $req = curl_init();
        curl_setopt_array($req, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $this->url.'/editTodo'.$id,
            CURLOPT_HTTPHEADER => array(
                'Content-type: application/json',
                'Content-Length'.strlen($data)),
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => $data
        ));
        try {
            $data = curl_exec($req);
            $inf = curl_getinfo($req, CURLINFO_RESPONSE_CODE);
        } finally {
            curl_close($req);
        }
        return $inf;
    }
}