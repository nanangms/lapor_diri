<?php

namespace App\Exports;

use App\Pendaftaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Jenssegers\Date\Date;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LaporanExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize, WithEvents
{
    public function collection()
    {
        return Pendaftaran::orderby('id','ASC')->get();
    }

    public function map($pendaftaran): array
    {
    	Date::setLocale('id');
        return [
            $pendaftaran->no_pendaftaran,
            $pendaftaran->nama,
            '('.$pendaftaran->nik.')',
            $pendaftaran->email,
            Date::parse($pendaftaran->tgl_lahir)->format('j F Y'),
            umur($pendaftaran->tgl_lahir),
            $pendaftaran->jenis_kelamin,
            $pendaftaran->alamat_lengkap,
            $pendaftaran->kota,
            $pendaftaran->no_hp,
            $pendaftaran->kategori,
            $pendaftaran->instagram,
            $pendaftaran->app_digunakan,
            $pendaftaran->strava,
            $pendaftaran->kategori_sepeda,
            $pendaftaran->jenis_sepeda,
            $pendaftaran->komunitas_sepeda
        ];
    }

    public function headings(): array
    {
        return [
            'NO PENDAFTARAN',
            'NAMA',
            'NIK',
            'EMAIL',
            'TANGGAL LAHIR',
            'UMUR',
            'JENIS KELAMIN',
            'ALAMAT LENGKAP',
            'KOTA',
            'NO. HP/WA',
            'KATEGORI',
            'INSTAGRAM',
            'APP YG DIGUNAKAN',
            'NAMA AKUN STRAVA/RELIVE',
            'KATEGORI SEPEDA',
            'JENIS SEPEDA',
            'KOMUNITAS SEPEDA'

        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }
}
