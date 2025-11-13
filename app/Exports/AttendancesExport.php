<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AttendancesExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->query->with('event')->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Event',
            'Country',
            'Arrived At',
            'Checked By',
            'Created At',
        ];
    }

    /**
     * @param mixed $attendance
     * @return array
     */
    public function map($attendance): array
    {
        return [
            $attendance->id,
            $attendance->user->name,
            $attendance->user->email,
            $attendance->event->title ?? '',
            $attendance->country ?? '',
            $attendance->used_at ? $attendance->used_at->format('Y-m-d H:i:s') : '',
            $attendance->checked_in_by ?? '',
            $attendance->created_at->format('Y-m-d H:i:s'),
        ];
    }
}

