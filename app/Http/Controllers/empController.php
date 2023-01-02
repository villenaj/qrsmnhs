<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\employee;
use Session;

// To generate QR Code
use SimpleSoftwareIO\QrCode\Facades\QrCode;
// To save image into Cloudinary
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class empController extends Controller
{
    //
    public function saveEmployee(Request $request)
    {
		// Create a new member record
		$newMem = new employee;
	    
	    $newMem->id = $request->id;
	    $newMem->firstname = $request->firstname;
	    $newMem->middlename = $request->middlename;
	    $newMem->lastname = $request->lastname;
	    $newMem->age = $request->age;
	    $newMem->position = $request->position;
	    $newMem->birthday = $request->birthday;
	    $newMem->startdate = $request->startdate;
	    $newMem->email = $request->email;
	    $newMem->phone = $request->phone;

    	// Validate the request data
		if ($request->hasFile('image')) {
            $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
			$publicId = substr($uploadedFileUrl, strlen("https://res.cloudinary.com/djv9g04ze/image/upload/"));
			$finalurl = str_replace("/", "-", $publicId);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $finalurl;	
            $file->move('uploads', $filename);
			$newMem->image = $filename;
		}
	    
	    $newMem->save();
		session()->flash('message', "Successfully added " . $request->firstname . " " . $request->lastname);
	    return redirect('/employee');
	}

	public function employee()
	{
	    $employees = employee::all();
		$fields = [
			[
			  'label' => 'ID Number',
			  'type' => 'number',
			  'name' => 'id',
			  'required' => true,
			  'minlength' => 7,
			  'maxlength' => 7
			],
			[
			  'label' => 'First name',
			  'type' => 'text',
			  'name' => 'firstname',
			  'required' => true
			],
			[
				'label' => 'Middle name',
				'type' => 'text',
				'name' => 'middlename'
			],
			[
				'label' => 'Last name',
				'type' => 'text',
				'name' => 'lastname',
				'required' => true
			],
			[   'label' => 'Age',
			    'type' => 'number',    
				'name' => 'age',    
				'required' => true,    
				'min' => 18,    
				'max' => 65  
			],
  			[   'label' => 'Position',
				'type' => 'select',
				'name' => 'position',
				'required' => true,
				'options' => [
					'Master Teacher I',
					'Master Teacher II',
					'Master Teacher III',
					'Administrator',
					'Staff'
				]
  			],
  			[   'label' => 'Birthday',    
				'type' => 'date',    
				'name' => 'birthday',
				'required' => true,
				'options' => [],
				'min' => '1950-01-01',
    			'max' => '2002-01-01'   
			],
			[   'label' => 'Start date',    
				'type' => 'date',    
				'name' => 'startdate',
				'required' => true,   
				'options' => []
			],
			[   'label' => 'Email',    
				'type' => 'email',    
				'name' => 'email',
				'required' => true   
			],
			[   'label' => 'Phone',    
				'type' => 'tel',    
				'name' => 'phone',
				'required' => true,
				'minlength' => 11,
				'maxlength' => 11   
			],
			[   'label' => 'Image',    
				'type' => 'file',    
				'name' => 'image'
			],

		];
	    return view('employee')->with('employees', $employees)->with('fields', $fields);
	}

	public function update(Request $request, $id){
		$employee = employee::find($id);
		$employee->id = $request->id;
		$employee->firstname = $request->firstname;
		$employee->middlename = $request->middlename;
		$employee->lastname = $request->lastname;
		$employee->age = $request->age;
		$employee->position = $request->position;
		$employee->birthday = $request->birthday;
		$employee->startdate = $request->startdate;
		$employee->email = $request->email;
		$employee->phone = $request->phone;
		$employee->id = $request->id;
		// Upload image to Cloudinary and download the file into the root directory
		if ($request->hasFile('image')) {
			$uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
			$publicId = substr($uploadedFileUrl, strlen("https://res.cloudinary.com/djv9g04ze/image/upload/"));
			$finalurl = str_replace("/", "-", $publicId);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $finalurl;	
            $file->move('uploads', $filename);
			$employee->image = $filename;
		}
		
		$employee->save();
		session()->flash('message', "Successfully updated " . $employee->firstname . " " . $employee->lastname);
		return redirect('/employee');
	}
 
	public function delete($id)
	{
		$employees = employee::find($id);
		$imageUrl = "$employees->image";
		$trimmedurl = substr($imageUrl, 12);
		$publicId = substr($trimmedurl, 0, 20);
		\Cloudinary::destroy($publicId);
		unlink(public_path('uploads/' . $employees->image));
		session()->flash('message', "Successfully removed " . $employees->firstname . " " . $employees->lastname);
		$employees->delete();
  
		return redirect('/employee');
	}
}
