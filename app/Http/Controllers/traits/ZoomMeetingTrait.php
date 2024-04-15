<?php

namespace App\Http\Controllers\traits;

use MacsiDigital\Zoom\Facades\Zoom;

trait ZoomMeetingTrait
{
    public function createMeeting($request){
        
        $user = Zoom::user()->first();

        $meetingData = [
            'topic' => $request->name,
            'duration' => $request->time,
            'password' => $request->password,
            'start_time' => $request->start_time,
         //   'timezone' => config('zoom.timezone')
            'timezone' => 'Africa/Cairo'
        ];
        $meeting = Zoom::meeting()->make($meetingData);

        $meeting->settings()->make([
            'join_before_host' => false,
            'host_video' => false,
            'participant_video' => false,
            'mute_upon_entry' => true,
            'waiting_room' => true,
            'approval_type' => config('zoom.approval_type'),
            'audio' => config('zoom.audio'),
            'auto_recording' => config('zoom.auto_recording')
        ]);

 

        return  $user->meetings()->save($meeting);
    }
}