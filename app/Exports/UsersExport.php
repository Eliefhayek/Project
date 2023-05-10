<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($users)
    {

    }
    public function collection()
    {
        return User::select('id','email', 'first_name', 'last_name', 'created_at')->get();
    }
    public function headings(): array
    {
        return [
            'ID',
            'Email',
            'First Name',
            'Last Name',
            'Created At',
        ];
    }
}
