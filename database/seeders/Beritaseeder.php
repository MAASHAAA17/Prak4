<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'judul' => 'Pemerintah Desa Jalatrang Kukuhkan Desa Siaga TB, Perkuat Kolaborasi Lintas Sektor',
                'kategori' => 'Kesehatan',
                'gambar' => 'https://jalatrang.id/assets/images/web_berita/1790660451-whatsapp-image-2026-09-28-at-102755.jpeg',
                'isi' => implode("\n\n", [
                    'Pemerintah Desa Jalatrang, Kecamatan Cipaku, Kabupaten Ciamis, menunjukkan komitmennya dalam meningkatkan kesadaran masyarakat terhadap pencegahan dan penanganan penyakit Tuberkulosis (TB). Komitmen tersebut diwujudkan melalui kegiatan pengukuhan Desa Siaga TB yang melibatkan berbagai unsur masyarakat dan pihak terkait.',
                    'Kegiatan ini menjadi salah satu langkah penting dalam memperkuat upaya pencegahan penyakit TB di tingkat desa. Melalui pembentukan Desa Siaga TB, masyarakat diharapkan memiliki pemahaman yang lebih baik mengenai gejala, pencegahan, serta pentingnya pemeriksaan dan pengobatan secara tepat.',
                    'Pemerintah Desa Jalatrang juga mendorong adanya kolaborasi antara pemerintah desa, tenaga kesehatan, kader, tokoh masyarakat, serta masyarakat secara luas. Kolaborasi tersebut diperlukan agar penanganan TB tidak hanya menjadi tanggung jawab tenaga kesehatan, tetapi menjadi kepedulian bersama.',
                    'Dengan adanya Desa Siaga TB, Pemerintah Desa Jalatrang berharap masyarakat semakin aktif dalam menjaga kesehatan lingkungan dan saling mendukung dalam upaya mencegah penyebaran penyakit. Kegiatan ini sekaligus menjadi bentuk nyata kepedulian pemerintah desa terhadap peningkatan kualitas kesehatan masyarakat.',
                ]),
                'dilihat' => 177,
                'penulis' => 'Admin',
                'tag' => 'desa,jalatrang,siaga',
                'created_at' => '2026-10-07 08:00:00',
            ],
            [
                'judul' => 'WAHANA JALATRANG MUDA Sabet Juara 1 Dom Cup 2026 Usai Taklukkan Perpaduan',
                'kategori' => 'Olahraga',
                'gambar' => 'https://jalatrang.id/assets/images/web_berita/1790408699-whatsapp-image-2026-09-25-at-174805.jpeg',
                'isi' => implode("\n\n", [
                    'Wahana Jalatrang Muda berhasil meraih prestasi membanggakan dengan menjadi juara pertama dalam ajang Dom Cup 2026. Keberhasilan tersebut diraih setelah melalui rangkaian pertandingan yang berlangsung dengan penuh semangat dan persaingan yang cukup ketat.',
                    'Tim Wahana Jalatrang Muda tampil konsisten sejak pertandingan awal. Kekompakan antarpemain, strategi permainan, serta dukungan dari para suporter menjadi salah satu faktor yang membantu tim mempertahankan performanya hingga pertandingan terakhir.',
                    'Ikatan Volley Ball Cakrabuana Dusun Cidoyang turut sukses menutup rangkaian turnamen dengan meriah. Ajang tersebut tidak hanya menjadi tempat untuk menunjukkan kemampuan para atlet, tetapi juga menjadi sarana untuk mempererat hubungan antarpemain, masyarakat, dan pecinta olahraga.',
                    'Raihan juara pertama dalam Dom Cup 2026 menjadi kebanggaan tersendiri bagi Wahana Jalatrang Muda. Prestasi tersebut diharapkan dapat menjadi motivasi bagi para pemain untuk terus meningkatkan kemampuan dan membawa nama baik Jalatrang dalam berbagai kompetisi olahraga berikutnya.',
                ]),
                'dilihat' => 256,
                'penulis' => 'Admin',
                'tag' => 'voli,bola,turnamen',
                'created_at' => '2026-10-06 08:00:00', // dibuat lebih baru agar tampil paling atas
            ],
        ];

        foreach ($data as $item) {
            $berita = Berita::firstOrNew(['judul' => $item['judul']]);
            $berita->forceFill($item)->save();
        }
    }
}