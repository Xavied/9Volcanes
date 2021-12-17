<?php

namespace App\Console;

use App\Models\Orden;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule
        ->call(function () {
          $hora = now()->subMinute(10);
          $ordenes = Orden::where('estado', 1)
            ->whereTime('created_at', '<=', $hora)
            ->get();
        
          foreach ($ordenes as $orden) {
            $productos = json_decode($orden->contenido);
            
            foreach ($productos as $producto) {
              aumentarCantidad($producto);
            }
          
            $orden->estado = 5;
            $orden->save();
          }
        })
        ->everyMinute();
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
