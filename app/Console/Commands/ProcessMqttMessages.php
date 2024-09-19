<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpMqtt\Client\MqttClient;
use App\Models\DatoSensor;

class ProcessMqttMessages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mqtt:subscribe';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Suscribe y procesa los mensajes MQTT de los sensores';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $mqtt = new MqttClient('mqtt.eclipse.org', 1883, 'laravel_subscriber');
        
        $mqtt->connect();
        
        // Suscribirse a los topics
        $mqtt->subscribe('sensores/temperatura', function ($topic, $message) {
            $this->saveTemperature(floatval($message));
        }, 0);

        $mqtt->subscribe('sensores/pulsos', function ($topic, $message) {
            $this->savePulsos(intval($message));
        }, 0);

        $mqtt->loop(true); // Mantener la conexión abierta
    }

    protected function saveTemperature($temperature)
    {
        DatoSensor::create([
            'temperatura' => $temperature,
            'pulsos' => null, // No hay pulsos en este mensaje
        ]);

        $this->info("Temperatura guardada: {$temperature}");
    }

    protected function savePulsos($pulsos)
    {
        DatoSensor::create([
            'temperatura' => null, // No hay temperatura en este mensaje
            'pulsos' => $pulsos,
        ]);

        $this->info("Pulsos guardados: {$pulsos}");
    }
}
