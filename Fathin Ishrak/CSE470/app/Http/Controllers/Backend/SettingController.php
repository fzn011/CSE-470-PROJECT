<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SmtpSetting;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth; 
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class SettingController extends Controller
{
    public function SmtpSetting(){

        $smpt = SmtpSetting::find(2);
        return view('admin.backend.setting.smpt_update',compact('smpt'));

    }// End Method 

    public function SmtpUpdate(Request $request){

        $smtp_id = $request->id;

        SmtpSetting::find($smtp_id)->update([
            'mailer' =>  $request->mailer,
            'host' =>  $request->host,
            'port' =>  $request->port,
            'username' =>  $request->username,
            'password' =>  $request->password,
            'encryption' =>  $request->encryption,
            'from_address' =>  $request->from_address, 
        ]);

        $notification = array(
            'message' => 'Smtp Setting Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);  

    
    
    }// End Method 































































}
