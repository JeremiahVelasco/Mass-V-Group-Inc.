<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Mail\ContactEmail;
use Illuminate\Support\Facades\Mail;
use Throwable;

class EmailController extends Controller
{
    //
    public function sendEmail(Request $request){
        try{
            $from=$request->input('email');
            $subject=$request->input('subject');
            $message=$request->input('message');
            Mail::to("info@mvgcircle.com")->send(new ContactEmail($message,$from,$subject));
            return response()->json(['success'=>true]);
        }
        catch(Throwable $e){
            return response()->json(['success'=>false,'error'=>$e->getMessage()],Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
