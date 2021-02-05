<?php

namespace App\Utilities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AuditTrail extends Model
{
    public function recordAction($module, $action){

        DB::table('tblaudit_trail')
            ->insert([
                'username' => session()->get('emp-username'),
                'module' => $module,
                'action' => $action,
                'created_at' => date('Y-m-d h:m:s')
            ]);
    }
}
