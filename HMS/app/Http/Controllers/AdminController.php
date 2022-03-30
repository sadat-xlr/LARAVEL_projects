<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class AdminController extends Controller
{
    //
    public function addDoctorView()
    {
        $this->authorize('create', Doctor::class);

        return view('admin.addDoctorView');
    }
    public function addDoctor()
    {

        $this->authorize('create', Doctor::class);

        $data = request()->validate(
            [
                'name' => 'required',
                'phone' => 'required|numeric',
                'speciality' => 'required',
                'room' => 'required|numeric',
                'image' => '',
            ],
            [
                'name.required' => '*',
                'phone.required' => '*',
                'speciality.required' => '*',
                'room.required' => '*',

            ]
        );
        $imagePath = request('image')->store('doctor_image', 'public');

        Doctor::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'speciality' => $data['speciality'],
            'room' => $data['room'],
            'image' => $imagePath
        ]);
        Alert::toast('Dcotor Added Succesfully', 'success');
        return redirect()->back();
    }
}
