<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class MessageController extends Controller
{

public function reply(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'reply' => 'required|string',
    ]);

    // إرسال الإيميل
    Mail::raw($request->reply, function ($message) use ($request) {
        $message->to($request->email)
                ->subject('رد على رسالتك من إدارة الموقع')
                ->from('your-email@example.com', 'اسم الموقع أو الإدارة');
    });

    return back()->with('success', 'تم إرسال الرد بنجاح');
}

}
