<?php

namespace Database\Seeders;

use App\Models\Relawan;
use App\Models\User;
use Carbon\CarbonImmutable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class RelawanSeeder extends Seeder
{
    /**
     * Seed volunteer data for end-to-end feature testing.
     */
    public function run(): void
    {
        $adminUserId = User::query()
            ->where('email', 'admin@bnpb.local')
            ->value('id');

        $seedData = [
            [
                'relawan' => [
                    'nama' => 'Ahmad Fauzi',
                    'nik' => '6301010101010001',
                    'pekerjaan' => 'Guru',
                    'pendidikan' => 'S1',
                    'alamat' => 'Jl. Veteran No. 12, Kandangan',
                    'no_hp' => '081234567801',
                    'email' => 'ahmad.fauzi@relawan.local',
                    'lokasi_domisili' => 'Kandangan',
                    'area_tugas' => 'Kandangan Kota',
                    'status' => 'approved',
                    'tanggal_disetujui' => CarbonImmutable::parse('2026-02-03 09:10:00'),
                    'masa_aktif' => CarbonImmutable::parse('2026-12-31')->toDateString(),
                    'is_public_contact' => true,
                    'is_active' => true,
                ],
                'files' => [
                    [
                        'file_name' => 'ktp-ahmad-fauzi.pdf',
                        'file_type' => 'application/pdf',
                        'content' => 'Dummy KTP Ahmad Fauzi',
                    ],
                    [
                        'file_name' => 'sertifikat-pelatihan-ahmad.pdf',
                        'file_type' => 'application/pdf',
                        'content' => 'Dummy Sertifikat Pelatihan Ahmad Fauzi',
                    ],
                ],
                'logs' => [
                    [
                        'action' => 'approve',
                        'old_status' => 'pending',
                        'new_status' => 'approved',
                        'old_is_active' => true,
                        'new_is_active' => true,
                        'old_is_public_contact' => false,
                        'new_is_public_contact' => false,
                        'note' => 'Lolos verifikasi dokumen.',
                        'changed_at' => CarbonImmutable::parse('2026-02-03 09:10:00'),
                    ],
                    [
                        'action' => 'publish_contact',
                        'old_status' => 'approved',
                        'new_status' => 'approved',
                        'old_is_active' => true,
                        'new_is_active' => true,
                        'old_is_public_contact' => false,
                        'new_is_public_contact' => true,
                        'note' => 'Kontak dipublikasikan untuk kebutuhan lapangan.',
                        'changed_at' => CarbonImmutable::parse('2026-02-04 08:00:00'),
                    ],
                ],
            ],
            [
                'relawan' => [
                    'nama' => 'Siti Rahmah',
                    'nik' => '6301010101010002',
                    'pekerjaan' => 'Perawat',
                    'pendidikan' => 'D3',
                    'alamat' => 'Jl. A. Yani Km 4, Kandangan',
                    'no_hp' => '081234567802',
                    'email' => 'siti.rahmah@relawan.local',
                    'lokasi_domisili' => 'Kandangan',
                    'area_tugas' => 'Simpur',
                    'status' => 'approved',
                    'tanggal_disetujui' => CarbonImmutable::parse('2026-02-05 10:30:00'),
                    'masa_aktif' => CarbonImmutable::parse('2026-10-31')->toDateString(),
                    'is_public_contact' => true,
                    'is_active' => true,
                ],
                'files' => [
                    [
                        'file_name' => 'ktp-siti-rahmah.pdf',
                        'file_type' => 'application/pdf',
                        'content' => 'Dummy KTP Siti Rahmah',
                    ],
                ],
                'logs' => [
                    [
                        'action' => 'approve',
                        'old_status' => 'pending',
                        'new_status' => 'approved',
                        'old_is_active' => true,
                        'new_is_active' => true,
                        'old_is_public_contact' => false,
                        'new_is_public_contact' => true,
                        'note' => 'Disetujui oleh admin.',
                        'changed_at' => CarbonImmutable::parse('2026-02-05 10:30:00'),
                    ],
                ],
            ],
            [
                'relawan' => [
                    'nama' => 'Rizky Maulana',
                    'nik' => '6301010101010003',
                    'pekerjaan' => 'Mahasiswa',
                    'pendidikan' => 'SMA',
                    'alamat' => 'Jl. Singakarsa No. 20, Kandangan',
                    'no_hp' => '081234567803',
                    'email' => 'rizky.maulana@relawan.local',
                    'lokasi_domisili' => 'Kandangan',
                    'area_tugas' => 'Daha Selatan',
                    'status' => 'pending',
                    'tanggal_disetujui' => null,
                    'masa_aktif' => null,
                    'is_public_contact' => false,
                    'is_active' => true,
                ],
                'files' => [
                    [
                        'file_name' => 'ktp-rizky-maulana.pdf',
                        'file_type' => 'application/pdf',
                        'content' => 'Dummy KTP Rizky Maulana',
                    ],
                ],
                'logs' => [],
            ],
            [
                'relawan' => [
                    'nama' => 'Dina Lestari',
                    'nik' => '6301010101010004',
                    'pekerjaan' => 'Karyawan Swasta',
                    'pendidikan' => 'S1',
                    'alamat' => 'Jl. Ir PM Noor No. 3, Kandangan',
                    'no_hp' => '081234567804',
                    'email' => 'dina.lestari@relawan.local',
                    'lokasi_domisili' => 'Padang Batung',
                    'area_tugas' => 'Padang Batung',
                    'status' => 'rejected',
                    'tanggal_disetujui' => null,
                    'masa_aktif' => null,
                    'is_public_contact' => false,
                    'is_active' => false,
                ],
                'files' => [
                    [
                        'file_name' => 'ktp-dina-lestari.pdf',
                        'file_type' => 'application/pdf',
                        'content' => 'Dummy KTP Dina Lestari',
                    ],
                ],
                'logs' => [
                    [
                        'action' => 'reject',
                        'old_status' => 'pending',
                        'new_status' => 'rejected',
                        'old_is_active' => true,
                        'new_is_active' => false,
                        'old_is_public_contact' => false,
                        'new_is_public_contact' => false,
                        'note' => 'Data tidak lengkap, diminta daftar ulang.',
                        'changed_at' => CarbonImmutable::parse('2026-02-06 14:20:00'),
                    ],
                ],
            ],
            [
                'relawan' => [
                    'nama' => 'Budi Santoso',
                    'nik' => '6301010101010005',
                    'pekerjaan' => 'Wiraswasta',
                    'pendidikan' => 'SMA',
                    'alamat' => 'Jl. Pelita No. 8, Kandangan',
                    'no_hp' => '081234567805',
                    'email' => 'budi.santoso@relawan.local',
                    'lokasi_domisili' => 'Kalumpang',
                    'area_tugas' => 'Kalumpang',
                    'status' => 'approved',
                    'tanggal_disetujui' => CarbonImmutable::parse('2026-02-01 11:00:00'),
                    'masa_aktif' => CarbonImmutable::parse('2026-08-31')->toDateString(),
                    'is_public_contact' => false,
                    'is_active' => false,
                ],
                'files' => [
                    [
                        'file_name' => 'ktp-budi-santoso.pdf',
                        'file_type' => 'application/pdf',
                        'content' => 'Dummy KTP Budi Santoso',
                    ],
                ],
                'logs' => [
                    [
                        'action' => 'approve',
                        'old_status' => 'pending',
                        'new_status' => 'approved',
                        'old_is_active' => true,
                        'new_is_active' => true,
                        'old_is_public_contact' => false,
                        'new_is_public_contact' => false,
                        'note' => 'Disetujui pada verifikasi awal.',
                        'changed_at' => CarbonImmutable::parse('2026-02-01 11:00:00'),
                    ],
                    [
                        'action' => 'nonaktifkan',
                        'old_status' => 'approved',
                        'new_status' => 'approved',
                        'old_is_active' => true,
                        'new_is_active' => false,
                        'old_is_public_contact' => false,
                        'new_is_public_contact' => false,
                        'note' => 'Dinonaktifkan sementara karena tidak tersedia.',
                        'changed_at' => CarbonImmutable::parse('2026-02-12 09:45:00'),
                    ],
                ],
            ],
        ];

        foreach ($seedData as $data) {
            $relawanData = $data['relawan'];
            $files = $data['files'];
            $logs = $data['logs'];

            $relawan = Relawan::query()->updateOrCreate(
                ['nik' => $relawanData['nik']],
                $relawanData
            );

            $relawan->files()->delete();
            foreach ($files as $index => $fileData) {
                $storedPath = "relawan-files/seeder-{$relawan->id}-".($index + 1).'.pdf';
                Storage::disk('local')->put($storedPath, $fileData['content']);

                $relawan->files()->create([
                    'file_path' => $storedPath,
                    'file_name' => $fileData['file_name'],
                    'file_type' => $fileData['file_type'],
                    'file_size' => Storage::disk('local')->size($storedPath),
                ]);
            }

            $relawan->statusLogs()->delete();
            foreach ($logs as $log) {
                $relawan->statusLogs()->create([
                    'admin_user_id' => $adminUserId,
                    'action' => $log['action'],
                    'old_status' => $log['old_status'],
                    'new_status' => $log['new_status'],
                    'old_is_active' => $log['old_is_active'],
                    'new_is_active' => $log['new_is_active'],
                    'old_is_public_contact' => $log['old_is_public_contact'],
                    'new_is_public_contact' => $log['new_is_public_contact'],
                    'note' => $log['note'],
                    'changed_at' => $log['changed_at'],
                ]);
            }
        }
    }
}
