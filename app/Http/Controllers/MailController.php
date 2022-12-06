<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Mail;
use App\Mail\DemoMail;
  
class MailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $mailData = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp.'
        ];
         
       $mail=Mail::to('kushalchawda8@gmail.com')->send(new DemoMail($mailData));
           
           if ($mail) {
               echo "s";
           } else {
            echo "f"; 
           }
        dd("Email is sent successfully.");
    }
}