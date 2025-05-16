<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class studentController extends Controller
{
   public function students()
{
    $teacher = auth()->user();

    $students = $teacher->students()->where('role', 'student')->get();

    return view('student.addstudent', compact('students'));
}


public function store(Request $request)
{
    $request->validate([
        'first_name' => 'required|string',
        'last_name'  => 'required|string',
        'age'        => 'required|integer|min:1|max:100',
        'phone'      => 'nullable|string|max:20',
        'email'      => 'required|email|unique:users',
        'password'   => 'required|min:6',
    ]);

    $student = User::create([
        'first_name' => $request->first_name,
        'last_name'  => $request->last_name,
        'age'        => $request->age,
        'phone'      => $request->phone,
        'email'      => $request->email,
        'password'   => bcrypt($request->password),
        'role'       => 'student',
    ]);

    // ربط الطالب بالمعلم الحالي
    auth()->user()->students()->attach($student->id);

    return redirect()->back()->with('success', 'تمت إضافة الطالب بنجاح.');
}


public function update(Request $request, $id)
{
    $request->validate([
        'first_name' => 'required|string',
        'last_name'  => 'required|string',
        'age'        => 'required|integer|min:1|max:100',
        'phone'      => 'nullable|string|max:20',
        'email'      => 'required|email|unique:users,email,' . $id,
    ]);

    $student = User::findOrFail($id);

    $student->update([
        'first_name' => $request->first_name,
        'last_name'  => $request->last_name,
        'age'        => $request->age,
        'phone'      => $request->phone,
        'email'      => $request->email,
    ]);

    return back()->with('success', 'تم تحديث بيانات الطالب');
}


    public function destroy($id)
    {
        $student = User::findOrFail($id);
        $student->delete(); // soft delete
        return back()->with('success', 'تم حذف الطالب');
    }
}
