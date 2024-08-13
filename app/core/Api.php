<?php

class Api
{
    // Fungsi untuk mengirimkan request GET dengan query parameters
    public static function get($url, $params = [], $headers = [])
    {
        // Jika ada parameter, ubah menjadi query string dan tambahkan ke URL
        if (!empty($params)) {
            $queryString = http_build_query($params);
            $url .= '?' . $queryString;
        }

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $headers
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
            return "cURL Error #: " . $error;
        }

        return json_decode($response, true);
    }

    // Fungsi untuk mengirimkan request POST
    public static function post($url, $data, $headers = [])
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array_merge($headers, ['Content-Type: application/json'])
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
            return "cURL Error #: " . $error;
        }

        return json_decode($response, true);
    }

    // Fungsi untuk mengirimkan request PUT
    public static function put($url, $data, $headers = [])
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array_merge($headers, ['Content-Type: application/json'])
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
            return "cURL Error #: " . $error;
        }

        return json_decode($response, true);
    }

    // Fungsi untuk mengirimkan request DELETE
    public static function delete($url, $headers = [])
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "DELETE",
            CURLOPT_HTTPHEADER => $headers
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
            return "cURL Error #: " . $error;
        }

        return json_decode($response, true);
    }

    // Fungsi untuk membuat response JSON
    public static function response($data, $status = 200)
    {
        header("Content-Type: application/json");
        http_response_code($status);
        echo json_encode($data);
    }
}

