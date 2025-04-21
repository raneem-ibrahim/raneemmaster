<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\contact;
// use App\Notifications\NewContactMessage;
// use App\Models\User;

class AdminController extends Controller
{
    // هاي الدالة بتجيبلي معلومات المستخدم الي عمل تسجيل دخول
    public function show1( )
    {
        $user = auth()->user(); // أو Auth::user()
        return view('dashboard.pages.profile', compact('user'));
    }
    public function dash( )
    {
       
        return view('dashboard.dash');
    }


    //  هاي الدالة لتحديث صورة  البروفايل تبعت المعلم
    public function update(Request $request)
    {
        // التحقق من تسجيل الدخول
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'يجب تسجيل الدخول أولاً');
        }
    
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $user = auth()->user();
    
        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إذا كانت موجودة
            if ($user->image) {
                Storage::delete('public/' . $user->image);
            }
    
            // حفظ الصورة الجديدة
            $path = $request->file('image')->store('profile_images', 'public');
            $user->image = $path;
            $user->save();
        }
    
        return back()->with('success', 'تم تحديث الصورة بنجاح');
    }
    
// لحد هون 
// form contactus 
public function storecontact(Request $request)
{
    contact::create([
        'full_name' => $request->full_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'message' => $request->message,
        // is_read سيتم إضافته تلقائيًا كـ false بسبب default
    ]);

    return redirect()->back()->with('success', 'تم إرسال رسالتك بنجاح!');
}


// هي لعرض الرسائل 
public function show2($id)
{
    $message = Contact::findOrFail($id);

    // حدّث الرسالة إلى "مقروءة"
    if (!$message->is_read) {
        $message->is_read = true;
        $message->save(); // ✅ احفظ التغيير في قاعدة البيانات
    }

    return view('dashboard.show', compact('message'));
}


}
