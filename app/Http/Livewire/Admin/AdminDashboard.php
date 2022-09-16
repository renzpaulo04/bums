<?php

namespace App\Http\Livewire\Admin;

use App\Models\Projects;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class AdminDashboard extends Component
{
      public function render()
    {

        $pendingRequest = Projects::where('status','request')->count();
        $ApproveRequest = Projects::where('status','approved')->count();
        return view('livewire.admin.admin-dashboard',[
            'pendingRequest' => $pendingRequest,
            'ApproveRequest' => $ApproveRequest,
        ]);
    }
}
