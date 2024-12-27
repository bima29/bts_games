<?php

class Digiflazz
{
    private $username;
    private $prod_key;
    private $endpoint;

    public function __construct()
    {
        $this->username = 'siyonaop5jdD';  // Gantilah dengan username yang sesuai
        $this->prod_key = 'f72ff07a-96dc-5be4-a854-8a3e20d28ba1';  // Gantilah dengan prod_key yang sesuai
        $this->endpoint = 'https://api.digiflazz.com/v1/transaction';
    }

    public function createTransaction($buyer_sku_code, $customer_no, $ref_id)
    {
        // Membuat signature berdasarkan username, prod_key, dan ref_id
        $sign = md5($this->username . $this->prod_key . $ref_id);
        
        // Payload data yang akan dikirim ke DigiFlazz API
        $payload = [
            'username' => $this->username,
            'buyer_sku_code' => $buyer_sku_code,
            'customer_no' => $customer_no,
            'ref_id' => $ref_id,
            'testing' => false,
            'sign' => $sign,
        ];

        // Inisialisasi cURL
        $ch = curl_init($this->endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));  // Mengirim data dalam format JSON
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);

        // Eksekusi cURL dan ambil respons
        $response = curl_exec($ch);
        
        
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);  // Cek status code HTTP
        $curl_error = curl_error($ch);  // Cek jika ada error dalam permintaan
        curl_close($ch);

        // Tangani kesalahan jika koneksi gagal
        if ($http_code !== 200 || !$response) {
            return [
                'status' => 'error',
                'message' => $curl_error ? $curl_error : 'Failed to connect to DigiFlazz API',
            ];
        }

        // Decode respons JSON dari API
        $result = json_decode($response, true);

        // Jika ada kesalahan saat mendecode JSON
        if (json_last_error() !== JSON_ERROR_NONE) {
            return [
                'status' => 'error',
                'message' => 'Invalid JSON response',
            ];
        }

        // Kembalikan hasil dari API
        return $result;
    }
    
      public function getTransactionStatus($ref_id)
    {
        $sign = md5($this->username . $this->prod_key . $ref_id);
        
        $payload = [
            'username' => $this->username,
            'ref_id' => $ref_id,
            'sign' => $sign,
        ];

        $ch = curl_init($this->endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_error = curl_error($ch);
        curl_close($ch);

        if ($http_code !== 200 || !$response) {
            return [
                'status' => 'error',
                'message' => $curl_error ? $curl_error : 'Failed to connect to DigiFlazz API',
            ];
        }

        $result = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return [
                'status' => 'error',
                'message' => 'Invalid JSON response',
            ];
        }

        return $result['data'] ?? null;
    }
}

