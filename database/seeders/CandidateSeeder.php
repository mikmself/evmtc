<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Candidate;

class CandidateSeeder extends Seeder
{
    public function run()
    {
        Candidate::create([
            'name' => 'Budi Santoso',
            'vision' => 'Mewujudkan masyarakat yang mandiri, sejahtera, dan bermartabat melalui pembangunan berkelanjutan yang berbasis nilai-nilai budaya lokal serta inovasi yang menyeluruh.',
            'mission' => '1. Meningkatkan kualitas pendidikan dengan akses yang merata dan program beasiswa untuk siswa berprestasi. 2. Mengembangkan infrastruktur yang berkelanjutan dan ramah lingkungan di seluruh wilayah. 3. Memperkuat sektor kesehatan dengan menyediakan layanan yang mudah diakses dan berkualitas. 4. Mendorong pemberdayaan ekonomi masyarakat melalui pelatihan keterampilan dan program kewirausahaan. 5. Melestarikan budaya lokal dan mempromosikannya ke tingkat nasional dan internasional.',
            'motto' => 'Bersama kita bangun masa depan yang cerah, penuh keadilan, dan kesejahteraan bagi semua.',
            'photo' => 'https://images.unsplash.com/photo-1580880783109-6746c2199006?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        ]);

        Candidate::create([
            'name' => 'Siti Aisyah',
            'vision' => 'Menciptakan komunitas yang harmonis, adil, dan inklusif, di mana setiap individu memiliki kesempatan untuk berkembang dan berkontribusi secara maksimal.',
            'mission' => '1. Memperjuangkan kesetaraan gender dan hak asasi manusia di setiap aspek kehidupan. 2. Mengembangkan program kesehatan preventif yang menekankan gaya hidup sehat. 3. Menginisiasi program lingkungan hijau untuk menjaga keseimbangan ekosistem. 4. Mengoptimalkan sektor pariwisata dengan mengedepankan keindahan alam dan budaya lokal. 5. Memberdayakan kaum muda dengan program pelatihan teknologi dan keterampilan kerja.',
            'motto' => 'Bersatu dalam keberagaman, menuju kemajuan yang berkelanjutan dan inklusif.',
            'photo' => 'https://images.unsplash.com/photo-1495924979005-79104481a52f?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        ]);

        Candidate::create([
            'name' => 'Ahmad Fauzi',
            'vision' => 'Menghadirkan pemerintahan yang bersih, transparan, dan melayani masyarakat dengan adil, serta menciptakan kemajuan yang dapat dinikmati oleh setiap generasi.',
            'mission' => '1. Meningkatkan pelayanan publik dengan teknologi modern yang memudahkan masyarakat. 2. Menyediakan akses air bersih dan listrik untuk seluruh pelosok daerah. 3. Mendorong peningkatan produktivitas pertanian dengan menyediakan dukungan teknologi dan fasilitas. 4. Menggalakkan program literasi digital untuk menghadapi era revolusi industri 4.0. 5. Mengurangi tingkat pengangguran dengan menciptakan lebih banyak lapangan kerja dan memperkuat UMKM.',
            'motto' => 'Pembangunan untuk semua, demi masa depan yang lebih baik dan berkelanjutan.',
            'photo' => 'ahttps://images.unsplash.com/photo-1580880783226-2eb5a737db5b?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        ]);
    }
}
