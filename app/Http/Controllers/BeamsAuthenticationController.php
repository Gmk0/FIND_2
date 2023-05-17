<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pusher\PushNotifications\PushNotifications;

class BeamsAuthenticationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $beamsClient = new PushNotifications([
            'instanceId' => config('services.pusher.beams_instance_id'),
            'secretKey' => config('services.pusher.beams_secret_key'),
        ]);

        // Abort unless the logged in user id is the same
        // as the channel user id he wants to access to
        abort_unless(auth()->id() == $request->get('user_id'), 401);

        $beamsToken = $beamsClient->generateToken((string) auth()->id());

        return response()->json($beamsToken);
        //
    }
}
