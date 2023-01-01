<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OneSignal\Config;
use OneSignal\Devices;


class oneSignalController extends Controller
{
    function sendNotification() {
        // Set your app id and REST API key
        $config = new Config();
        $config->setApplicationId('f0074e47-a768-4528-bdba-b5621abbd53b');
        $config->setApplicationAuthKey('YjIyNmYyZjMtMzUzMC00NWZkLWE2NmItNTc1OTcyMTI0M2Nm');
    
        // Create a new devices object
        $devices = new Devices($config);
    
        // Set the parameters for the notification
        $params = [
            'contents' => [
                'en' => 'Hello, world!'
            ],
            'include_player_ids' => ['YOUR-PLAYER-ID']
        ];
    
        // Send the notification
        $response = $devices->createNotification($params);
    }
}
