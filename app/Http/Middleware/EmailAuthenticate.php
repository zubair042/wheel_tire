<?php

namespace App\Http\Middleware;

use Closure;
use Auth, Mail;
use App\User;

class EmailAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		if (Auth::User()->authentication == true) {
			
			if(Auth::User()->authentication_code==NULL){
				$random_string = $this->generateRandomString(5);
				$user = User::find(Auth::User()->id);
				$user->authentication_code = $random_string;
				$user->authentication_status = 'N';
				$user->save();
				if(env('DB_PASSWORD', false)!=""){
					$data = array('name'=>"First Last");
					Mail::send('emails.authmail', $data, function($message) {
					   $message->to('comet_nice2@yahoo.com', 'Tutorials Point')->subject
						  ('Laravel HTML Testing Mail');
					   $message->from('xyz@gmail.com','First Last');
					});			
				}
				return redirect('authenticate');
			}
			if(Auth::User()->authentication_status=='N'){
				return redirect('authenticate');
			}
			
			return $next($request);
		}
        return $next($request);
    }
	
	function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}	
}
