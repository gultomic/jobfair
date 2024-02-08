<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Event;
use App\Models\Kehadiran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function webCheckin(Request $request)
    {
        $event = Event::find($request->id);
        $status = true;
        $checkin = false;

        //EXPIRED EVENT
        if ($event->tanggal < Carbon::now()->format("Y-m-d")) {
            $status = false;
        }

        $attend = $event->kehadiran
            ->where('user_id', Auth::user()->id)
            ->first();


        if ($attend) {
            $checkin = true;
        } else {
            try {
                $attend = Kehadiran::create([
                    'event_id' => $request->id,
                    'user_id' => Auth::user()->id,
                ]);
            } catch (\Throwable $th) {
                $status = $th->getMessage();
            }
        }

        return view('checkin', compact('event', 'status', 'checkin', 'attend'));
    }

    public function qrCheckin(Request $request)
    {
        $status = true;
        $message = 'Succes';
        $jfe = Event::find($request->event_id);

        $event = [
            'jobfair' => $jfe->jobfair->nama,
            'tanggal' => Carbon::parse($jfe->tanggal)
                ->locale('id_ID')
                ->translatedFormat('l j F Y'),
            'lokasi' => $jfe->refs['lokasi'],
            'userName' => Auth::user()->name,
        ];

        // //EXPIRED EVENT
        if ($jfe->tanggal !== Carbon::now()->format("Y-m-d")) {
            $event['info'] = 'expired';
        }

        $attend = $jfe->kehadiran
            ->where('user_id', Auth::user()->id)
            ->first();

        if ($attend) {
            $event['info'] = 'already';
            $event['record'] = Carbon::parse($attend->created_at)
            ->locale('id_ID')
            ->translatedFormat('l j F Y, H:i:s');
        } else {
            try {
                $attend = Kehadiran::create([
                    'event_id' => $request->event_id,
                    'user_id' => Auth::user()->id,
                ]);

                $event['info'] = 'success';
                $event['record'] = Carbon::parse($attend->created_at)
                ->locale('id_ID')
                ->translatedFormat('l j F Y, H:i:s');
            } catch (\Throwable $th) {
                $status = false;
                $message = $th->getMessage();
            }
        }

        return response()->json([
            'status' => $status,
            'message' => $message,
            'event' => $event
        ], 200);
    }

    public function apiLogin(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);


            if(Auth::attempt($request->only(['email', 'password']) + ['access' => 1])) {

                return response()->json([
                    'status' => true,
                    'message' => 'Login success',
                    'token' => Auth::user()->createToken("API TOKEN")->plainTextToken
                ], 200);
            }

            return response()->json([
                'status' => false,
                'message' => 'Your credentials does not match with our record.',
            ], 401);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
