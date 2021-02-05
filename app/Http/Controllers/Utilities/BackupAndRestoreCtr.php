<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utilities\User;

class BackupAndRestoreCtr extends Controller
{
    private $module = 'Utilities';

    public function index(){

        $user = new User;
        $user->isUserAuthorize($this->module);

        return view('/utilities/backup_restore');
    }

    public function backup(){
        $filename = "backup-" . date('Y-m-d') . ".sql";

        $command = "".env('DUMP_PATH')." --user=" . env('DB_USERNAME') . " --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  > " . storage_path() . "/app/backup/" . $filename;

        $returnVar = NULL;
        $output = NULL;

        exec($command, $output, $returnVar);

        return redirect('/utilities/backup-and-restore')->with('success', 'Datebase is successfully backup.');
    }

    public function restore(){
        $filename = "backup-" . date('Y-m-d') . ".sql";

        $command = "".env('IMP_PATH')." --user=" . env('DB_USERNAME') . " --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  < " . storage_path() . "/app/backup/" . $filename;

        $returnVar = NULL;
        $output = NULL;

        exec($command, $output, $returnVar);

        return redirect('/utilities/backup-and-restore')->with('success', 'Datebase is successfully restored.');
    }
}
