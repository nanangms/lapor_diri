<?php

namespace App\Exports;

use App\Lapor_diri;
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
        return Lapor_diri::with(['kecamatan','kelurahan'])->orderby('id','ASC')->get();
    }

    public function map($lapor_diri): array
    {
    	Date::setLocale('id');
        return [
            $lapor_diri->nama,
            '('.$lapor_diri->nik.')',
            $lapor_diri->umur,
            $lapor_diri->jenis_kelamin,
            $lapor_diri->kecamatan->nama_kecamatan,
            $lapor_diri->kelurahan->nama_kelurahan,
            $lapor_diri->rt,
            $lapor_diri->no_rumah,
            $lapor_diri->alamat,
            $lapor_diri->no_telp,
            $lapor_diri->pekerjaan,
            Date::parse($lapor_diri->tgl_test)->format('j F Y'),
            $lapor_diri->tempat_test,
            $lapor_diri->keluhan_klinis,
            $lapor_diri->penyakit,
            $lapor_diri->riwayat,
            $lapor_diri->permintaan_khusus,
            $lapor_diri->status,
            $lapor_diri->lokasi_isolasi,
            $lapor_diri->saturasi_oksigen,
            $lapor_diri->denyut_nadi,
            $lapor_diri->tekanan_darah,
            $lapor_diri->obat
        ];
    }

    public function headings(): array
    {
        return [
            'NAMA',
            'NIK',
            'UMUR',
            'JENIS KELAMIN',
            'KECAMATAN',
            'KELURAHAN',
            'RT',
            'No. RUMAH',
            'ALAMAT',
            'NO. HP',
            'PEKERJAAN',
            'TANGGAL TEST',
            'TEMPAT TEST',
            'KELUHAN KLINIS',
            'PENYAKIT YANG PERNAH DIDERITA',
            'RIWAYAT/SUMBER KONTAK KASUS',
            'PERMINTAAN KHUSUS',
            'STATUS',
            'LOKASI ISOLASI',
            'SATURASI OKSIGEN',
            'DENYUT NADI',
            'TEKANAN DARAH',
            'OBAT YANG DIKONSUMSI'

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
