<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Task;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Disease;

class statisticsController extends Controller
{
    public function index()
    {
        $data = [];
        $data['users'] = User::where('role', '!=', 'Gerant')->count();
        $data['diseases'] = Disease::count();
        $data['Traitement'] = Task::where('TypeTask', 'Traitement')
            ->where('Status', 'Done')->count();
        $data['PendingTasks'] = Task::where('Status', 'Pending')->count();

        return response()->json($data, 200);
    }
}
