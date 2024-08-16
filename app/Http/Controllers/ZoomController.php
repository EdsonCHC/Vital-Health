<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ZoomController extends Controller
{
    protected $client;
    protected $apiKey;
    protected $apiSecret;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('ZOOM_API_KEY');
        $this->apiSecret = env('ZOOM_API_SECRET');
    }

    public function createMeeting()
    {
        $token = $this->generateJWT();

        try {
            $response = $this->client->post('https://api.zoom.us/v2/users/me/meetings', [
                'headers' => [
                    'Authorization' => "Bearer $token",
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'topic' => 'Mi Reunión',
                    'type' => 1, // Instant Meeting
                    'duration' => 40, // En minutos
                    'timezone' => 'America/New_York',
                ],
            ]);

            $data = json_decode($response->getBody()->getContents(), true);
            $joinUrl = $data['join_url'] ?? '';

            return view('zoom-meeting', ['joinUrl' => $joinUrl]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear la reunión: ' . $e->getMessage()], 500);
        }
    }

    private function generateJWT()
    {
        $header = json_encode([
            'alg' => 'HS256',
            'typ' => 'JWT',
        ]);

        $payload = json_encode([
            'iss' => $this->apiKey,
            'exp' => time() + 3600, // Token válido por 1 hora
        ]);

        $base64UrlHeader = str_replace(['+', '/'], ['-', '_'], base64_encode($header));
        $base64UrlPayload = str_replace(['+', '/'], ['-', '_'], base64_encode($payload));
        $signature = hash_hmac('sha256', "$base64UrlHeader.$base64UrlPayload", $this->apiSecret, true);
        $base64UrlSignature = str_replace(['+', '/'], ['-', '_'], base64_encode($signature));

        return "$base64UrlHeader.$base64UrlPayload.$base64UrlSignature";
    }
}
