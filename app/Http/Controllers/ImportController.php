<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\In;

class ImportController extends Controller
{

    public function importForm()
    {
        return view('admin.import.form');
    }

    public function ImportCSV(Request $request)
    {

        $table = $request->table;

        $this->validate($request, [
            'csv_file' => 'required|mimes:csv,txt',
            'table' => 'required',
            // 'extension'      => 'required|in:csv',
        ]);

        $filename = $request->file('csv_file')->path();

        if (in_array($table, ['users'])) {

            switch ($table) {
                case 'atpls':
                    $this->importUsers($filename);
                    break;
                default:
                    break;

            }
        }


    }


    public function importUsers($filepath)
    {

        $handle = fopen($filepath, "r");
        $header = true;

        while ($csvLine = fgetcsv($handle, 1000, ",")) {

            $requestData = array(
                'name' => $csvLine[1],
                'email' => $csvLine[2],
                'email_verified_at' => $csvLine[3],
                'password' => $csvLine[4],
                'avatar' => $csvLine[5],
                'role' => $csvLine[6],
                'bio' => $csvLine[7],
                'remember_token' => $csvLine[8],
                'created_at' => $csvLine[9],
                'updated_at' => $csvLine[10],
                'is_developer' => $csvLine[11],
                'code_2fa' => $csvLine[12],
                'twofactory_expiry' => $csvLine[13],
            );

            User::create($requestData);

        }
        return redirect('admin/atpl');

    }
}
