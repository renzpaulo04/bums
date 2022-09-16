<?php

namespace App\Http\Livewire\User;

use App\Models\Projects;
use Livewire\Component;
use App\Models\User;

use Illuminate\Support\Facades\Validator;

class Dashboard extends Component
{
 


    public function render()
    {
        $ProjectRequesting = Projects::where('user_name',auth()->user()->userName)->where('status','request')->count();
        $ProjectApproved = Projects::where('user_name',auth()->user()->userName)->where('status','approved')->count();
        return view('livewire.user.dashboard',[
            'ProjectRequesting' => $ProjectRequesting ,
            'ProjectApproved' => $ProjectApproved,
         ]);
    }
}
