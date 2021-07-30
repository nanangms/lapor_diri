<?php

namespace App\Exports;

use App\Hasilgowes;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Jenssegers\Date\Date;
use DB;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class Kategori76Export implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize, WithEvents
{
    public function collection()
    {
        $hasil = DB::table('hasil as a')
        ->leftjoin('pendaftaran as b','a.no_pendaftaran','b.no_pendaftaran')
        ->select('a.*','b.nama','b.nik','b.app_digunakan','b.strava','b.no_hp','a.id as id_hasil','a.created_at as tgl_kirim')
        ->where('b.kategori','76')
        ->groupBy('a.no_pendaftaran')
        ->orderBy('id_hasil','asc')->get();

        return $hasil;
    }

    public function map($pendaftaran): array
    {
        return [
            $pendaftaran->no_pendaftaran,
            $pendaftaran->nama,
            '('.$pendaftaran->nik.')',
            $pendaftaran->no_hp,
            $pendaftaran->app_digunakan,
            $pendaftaran->strava,
            $pendaftaran->jarak_tempuh,
            $pendaftaran->status
            
        ];
    }

    public function headings(): array
    {
        return [
            'NO PENDAFTARAN',
            'NAMA',
            'NIK',
            'NO. WA',
            'APP Digunakan',
            'NAMA AKUN GOWES',
            'JARAK YG DITEMPUH',
            'STATUS'
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
