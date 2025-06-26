<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Registration;
use App\Models\User;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::paginate(15);
        return view('admin.index', compact('registrations'));
    }
    public function store(StoreUserRequest $request)
    {
        if (Registration::where('passport_series', $request->passport_series)->exists() && User::where('passport_number', $request->passport_number)->exists())
        {
            return redirect()->back()->with('error', 'You have previously registered.');
        }
        try {
            $data = $request->validated();
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
            $data['passport_pdf'] = $request->file('passport_pdf')->store('passports', 'public');
            $data['diploma_pdf'] = $request->file('diploma_pdf')->store('diplomas', 'public');
            
            if ($request->hasFile('passport_rus')) {
                $data['passport_rus'] = $request->file('passport_rus')->store('passport_rus', 'public');
            }
            if ($request->hasFile('propiska')) {
                $data['propiska'] = $request->file('propiska')->store('propiska', 'public');
            }
            if ($request->gender == 'male') {
                $data['gender'] = true;
            }else{
                $data['gender'] = false;
            }
            [$data['diploma_series'], $data['diploma_number']] = explode('-', $request->diploma_series);
            // Foydalanuvchini yaratish
            Registration::create($data);
            
            return redirect()->back()->with('success', 'Foydalanuvchi muvaffaqiyatli saqlandi!');
        } catch (\Throwable $th) {
            \Log::error('User save error', ['error' => $th]);
            return back()->with('error', $th->getMessage()); // `error` bo'lishi kerak, `errors` emas

        }
    }
    public function show($id)
    {
        $registration = Registration::find($id);
        return view('admin.show', compact('registration'));
    }
}
