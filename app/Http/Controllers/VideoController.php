<?php

namespace App\Http\Controllers;

use App\Repositories\VideoRepository;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    protected VideoRepository $videoRepository;

    public function __construct(VideoRepository $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }

    public function getVideoTahukahKamu() {
        $videos = $this->videoRepository->getTahukahKamuVideo();
        return response()->json([
            'success' => true,
            'message' => 'List tahukah kamu video',
            'data' => $videos
        ], 200);
    }

    public function getVideoBereksperimenYuk() {
        $videos = $this->videoRepository->getBereksperimenYukVideo();
        return response()->json([
            'success' => true,
            'message' => 'List bereksperimen yuk video',
            'data' => $videos
        ], 200);
    }

    public function getVideoTipsTrik() {
        $videos = $this->videoRepository->getTipsTrikVideo();
        return response()->json([
            'success' => true,
            'message' => 'List tips trik video',
            'data' => $videos
        ], 200);
    }
}
