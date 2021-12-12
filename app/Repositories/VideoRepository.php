<?php
namespace App\Repositories;

use App\Models\Video;

class VideoRepository {
    public function getTahukahKamuVideo() {
        return Video::where('category', 'TK')->get();
    }

    public function getBereksperimenYukVideo() {
        return Video::where('category', 'BY')->get();
    }

    public function getTipsTrikVideo() {
        return Video::where('category', 'TT')->get();
    }
}
