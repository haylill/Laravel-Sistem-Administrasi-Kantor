<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;


class GajiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:gaji';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = DB::table('users')->get();
        foreach ($users as $user) {          
            //mengambil data dari tanngal 1 sampai akhir bulan di tahun sekarang
            $date = date('Y-m-d', strtotime('first day of this month'));
            $date2 = date('Y-m-d', strtotime('last day of this month'));
            // mengambil jumlah data dari tanggal 1 sampai akhir bulan di tahun sekarang
            $total_masuk = DB::table('absensi')->where('id_karyawan', $user->id_karyawan)->whereBetween('waktu', [$date, $date2])->count();
            // get gaji dan bonus di tabel gaji
            $gaji = DB::table('gaji')->where('id_karyawan', $user->id_karyawan)->first();
            // menghitung total gaji
            $total_gaji = ($total_masuk*$gaji->gaji) + $gaji->bonus;
            // masukkan total_gaji dan total_masuk ke tabel penggajian
            DB::table('penggajian')->insert([
                'id_karyawan' => $user->id_karyawan,
                'total_gaji' => $total_gaji,
                'total_masuk' => $total_masuk,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')            
            ]);
        }
        $this->info('Gaji Berhasil Diupdate');
    }
}