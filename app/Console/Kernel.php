<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;


class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // schedule every 1 month to update total_masuk from absensi table
        $schedule->call(function () {
            $users = DB::table('users')->get();
            foreach ($users as $user) {          
                //mengambil data dari tanngal 1 sampai akhir bulan di tahun sekarang
                $date = date('Y-m-d', strtotime('first day of this month'));
                $date2 = date('Y-m-d', strtotime('last day of this month'));
                // mengambil jumlah data dari tanggal 1 sampai akhir bulan di tahun sekarang
                $total_masuk = DB::table('absensi')->where('id_karyawan', $user->id_karyawan)->whereBetween('waktu', [$date, $date2])->count();
                DB::table('gaji')->where('id_karyawan', $user->id_karyawan)->update(['total_masuk' => $total_masuk]);
            }
        })->monthly();
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
