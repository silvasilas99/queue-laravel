<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Log;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessGame implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The array of games in json format.
     *
     */
    protected $games;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($games)
    {
        $this->games = $games;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $header = false;
            $filename = public_path('csv_archives') . '/games.csv';
            $fp = fopen($filename, 'w');
            $headers = array(
                'Content-Type' => 'application/vnd.ms-excel; charset=utf-8',
                'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
                'Content-Disposition' => 'attachment; filename=download.csv',
                'Expires' => '0',
                'Pragma' => 'public',
            );

            foreach ($this->games as $line) {	
                if (empty($header)) {
                    $header = array_keys($line);
                    fputcsv($fp, $header);
                    $header = array_flip($header);		
                }
                
                $line_array = array();
                
                foreach($line as $value) {
                    array_push($line_array, $value);
                }
                
                fputcsv($fp, $line_array);
            }

            fclose($fp);
        } catch (\Throwable $err) {
            Log::error($err->getMessage());
        }
    }
}
