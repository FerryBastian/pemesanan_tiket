<?php

/**
 * Mengubah link YouTube biasa (watch?v=, youtu.be, atau embed)
 * menjadi format embed URL yang bisa dipakai di <iframe>.
 *
 * Contoh input yang didukung:
 * - https://www.youtube.com/watch?v=VIDEOID
 * - https://youtu.be/VIDEOID
 * - https://www.youtube.com/embed/VIDEOID (langsung dikembalikan)
 *
 * @param string|null $url
 * @return string|null
 */
function getYoutubeEmbedUrl($url)
{
    // Jika kosong, tidak ada video untuk ditampilkan
    if (empty($url)) {
        return null;
    }

    $videoId = null;

    // Kasus 1: format youtu.be/VIDEOID
    if (strpos($url, 'youtu.be/') !== false) {
        $parts = explode('youtu.be/', $url);
        $videoId = isset($parts[1]) ? explode('?', $parts[1])[0] : null;
    }
    // Kasus 2: format youtube.com/watch?v=VIDEOID
    elseif (strpos($url, 'watch?v=') !== false) {
        $parts = explode('watch?v=', $url);
        $videoId = isset($parts[1]) ? explode('&', $parts[1])[0] : null;
    }
    // Kasus 3: sudah berupa embed URL
    elseif (strpos($url, '/embed/') !== false) {
        return $url;
    }

    // Jika videoId berhasil didapat, susun ulang jadi embed URL
    if (!empty($videoId)) {
        return 'https://www.youtube.com/embed/' . $videoId;
    }

    // Jika format tidak dikenali, kembalikan null supaya tidak error di view
    return null;
}