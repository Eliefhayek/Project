<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Response;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
class FileController extends Controller
{
    //
    public function store(Request $request){
        $validatedData = $request->validate([
            'file' => 'required|file',
        ]);
    $path = $request->file('file')->store('public');

        return response()->json([
            'path' => $path
        ]);
    }
    public function privateStore(Request $request){
        $validatedData = $request->validate([
            'file' => 'required|file',
        ]);
        $path = $request->file('file')->store('private');
        return response()->json([
            'path' => $path
        ]);
    }
    public function getPrivateImages()
{
    $files = Storage::files('private');

    $images = [];
    foreach ($files as $file) {
        $images[] = Storage::url($file);
    }

    return response()->json($images);
}
public function createExcel(){
    $users = User::select('id', 'email', 'first_name', 'last_name', 'created_at')->get();
    $spreadsheet = new Spreadsheet();
    $worksheet = $spreadsheet->getActiveSheet();
    $worksheet->setCellValue('A1', 'ID')
              ->setCellValue('B1', 'Email')
              ->setCellValue('C1', 'First Name')
              ->setCellValue('D1', 'Last Name')
              ->setCellValue('E1', 'Created At');
    $row = 2;
    foreach ($users as $user) {
        $worksheet->setCellValue('A' . $row, $user->id)
                  ->setCellValue('B' . $row, $user->email)
                  ->setCellValue('C' . $row, $user->first_name)
                  ->setCellValue('D' . $row, $user->last_name)
                  ->setCellValue('E' . $row, $user->created_at);
        $row++;
    }
    $fileName = 'users.xlsx';
    $path = storage_path('app\public/' . $fileName);
    $writer = new Xlsx($spreadsheet);
    $writer->save($path);
    return response()->json(['message' => 'Users exported successfully']);
}

}
