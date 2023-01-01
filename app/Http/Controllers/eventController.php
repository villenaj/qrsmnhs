<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\event;
use App\Models\employee;
use Session;

class eventController extends Controller
{
    //
    public function event() {
        $events = event::all();
        return view('/event')->with('events', $events);
    }

    public function saveEvent(Request $request)
    {
		// Create a new member record
		$newEvent = new event;
	    
	    $newEvent->title = $request->title;
	    $newEvent->description = $request->description;
	    $newEvent->who = $request->who;
	    $newEvent->start = date('Y-m-d H:i:s', strtotime($request->start . ' ' . $request->starttime));
	    $newEvent->end = date('Y-m-d H:i:s', strtotime($request->end . ' ' . $request->endtime));
	    $newEvent->location = $request->location;
        $newEvent->id = $request->session()->get('user')['id'];
	    
	    $newEvent->save();

	    return redirect('/event');
	}

	public function update(Request $request, $id){
		$event = event::find($id);
		$startdate = $request->input('startdate');
    	$starttime = $request->input('starttime');

		$enddate = $request->input('enddate');
    	$endtime = $request->input('endtime');
		
		$event->title = $request->title;
		$event->description = $request->description;
		$start = date('Y-m-d H:i:s', strtotime("$startdate $starttime"));
		$end = date('Y-m-d H:i:s', strtotime("$enddate $endtime"));
		$event->who = $request->who;
		$event->location = $request->location;

		$event->save();
 
		return redirect('/event/eventmodify');
	}
 
	public function delete($id)
	{
		$events = event::find($id);
		$events->delete();
  
		return redirect('/event/eventmodify');
	}

	public function modify()
	{
		$events = event::all();
		$fields = [
			[
			  'label' => 'Title',
			  'type' => 'text',
			  'name' => 'title',
			  'required' => true
			],
			[
				'label' => 'Description',
				'type' => 'text',
				'name' => 'description',
                'required' => true
			],
  			[   'label' => 'Who',
				'type' => 'select',
				'name' => 'who',
				'required' => true,
				'options' => [
                    'All',
					'Master Teacher I',
					'Master Teacher II',
					'Master Teacher III',
					'Administrator',
					'Staff'
				]
  			],
  			[   'label' => 'Start Date',    
				'type' => 'date',    
				'name' => 'start',
				'required' => true,
				'options' => [],
				'min' => now()->format('Y-m-d')
			],
            [   'label' => 'Start Time',    
				'type' => 'time',    
				'name' => 'starttime',
				'required' => true,
				'options' => []
			],
			[   'label' => 'End Date',    
				'type' => 'date',    
				'name' => 'end',
				'required' => true,   
				'options' => [],
                'min' => now()->format('Y-m-d')
			],
            [   'label' => 'End Time',    
				'type' => 'time',    
				'name' => 'endtime',
				'required' => true,
				'options' => []
			],
            [
				'label' => 'Location',
				'type' => 'text',
				'name' => 'location',
                'required' => true
			],

		];
		return view('/event/eventmodify')->with('events', $events)->with('fields', $fields);
	}
}
