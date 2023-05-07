<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Agama;
use App\Models\User;
use App\Models\Dapil;
use App\Models\Kendaraan;
use App\Models\LevelStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //user login utama
        User::create([
            'name' => 'administrator system',
            'username' => 'administrator',
            'password' =>  bcrypt('12345678'),
            'level' => 1,
            'active' => 1,
            'foto' => '',
        ]);





        Agama::create([
            'nama' => 'Islam'
        ]);

        Agama::create([
            'nama' => 'Kristen Protestan'
        ]);

        Agama::create([
            'nama' => 'Katolik'
        ]);

        Agama::create([
            'nama' => 'Hindu'
        ]);

        Agama::create([
            'nama' => 'Buddha'
        ]);

        Agama::create([
            'nama' => 'Khonghucu'
        ]);

        Agama::create([
            'nama' => 'Lainya'
        ]);


      
        Dapil::create([
            'kode_kec' => 717101,
            'kecamatan' => 'BUNAKEN',
            'dapil' => 3,
            'nama' => 'KOTA MANADO 3'
        ]);

        Dapil::create([
            'kode_kec' => 717102,
            'kecamatan' => 'TUMINITNG',
            'dapil' => 3,
            'nama' => 'KOTA MANADO 3'
        ]);

        Dapil::create([
            'kode_kec' => 717103,
            'kecamatan' => 'SINGKIL',
            'dapil' => 4,
            'nama' => 'KOTA MANADO 4'
        ]);

        Dapil::create([
            'kode_kec' => 717104,
            'kecamatan' => 'WENANG',
            'dapil' => 1,
            'nama' => 'KOTA MANADO 1'
        ]);

        Dapil::create([
            'kode_kec' => 717105,
            'kecamatan' => 'TIKALA',
            'dapil' => 5,
            'nama' => 'KOTA MANADO 5'
        ]);

        Dapil::create([
            'kode_kec' => 717106,
            'kecamatan' => 'SARIO',
            'dapil' => 2,
            'nama' => 'KOTA MANADO 2'
        ]);

        Dapil::create([
            'kode_kec' => 717107,
            'kecamatan' => 'WANEA',
            'dapil' => 1,
            'nama' => 'KOTA MANADO 1'
        ]);

        Dapil::create([
            'kode_kec' => 717108,
            'kecamatan' => 'MAPANGET',
            'dapil' => 4,
            'nama' => 'KOTA MANADO 4'
        ]);

        Dapil::create([
            'kode_kec' => 717109,
            'kecamatan' => 'MALALAYANG',
            'dapil' => 2,
            'nama' => 'KOTA MANADO 2'
        ]);

        Dapil::create([
            'kode_kec' => 717110,
            'kecamatan' => 'BUNAKEN KEPULAUAN',
            'dapil' => 3,
            'nama' => 'KOTA MANADO 3'
        ]);

        Dapil::create([
            'kode_kec' => 717111,
            'kecamatan' => 'PAAL DUA',
            'dapil' => 5,
            'nama' => 'KOTA MANADO 5'
        ]);






        Kendaraan::create([
            'nama' => 'Partai Kebangkitan Bangsa',
            'nama_singkat' => 'PKB',
            'logo' => 'PKB.png'
        ]);

        Kendaraan::create([
            'nama' => 'Partai Gerakan Indonesia Raya',
            'nama_singkat' => 'Gerindra',
            'logo' => 'Gerindra.png'
        ]);

        Kendaraan::create([
            'nama' => 'Partai Demokras Indonesia Perjuangan',
            'nama_singkat' => 'PDIP',
            'logo' => 'PDIP.png'
        ]);

        Kendaraan::create([
            'nama' => 'Partai Golongan Karya',
            'nama_singkat' => 'Golkar',
            'logo' => 'Golkar.png'
        ]);

        Kendaraan::create([
            'nama' => 'Partai Nasdem',
            'nama_singkat' => 'Nasdem',
            'logo' => 'Nasdem.png'
        ]);

        Kendaraan::create([
            'nama' => 'Partai Buruh',
            'nama_singkat' => 'Buruh',
            'logo' => 'Buruh.png'
        ]);

        Kendaraan::create([
            'nama' => 'Partai Gelombang Rakyat Indoensia',
            'nama_singkat' => 'Gelora',
            'logo' => 'Gelora.png'
        ]);

        Kendaraan::create([
            'nama' => 'Partai Keadilan Sejahtera',
            'nama_singkat' => 'PKS',
            'logo' => 'PKS.png'
        ]);

        Kendaraan::create([
            'nama' => 'Partai Kebangkitan Nusantara',
            'nama_singkat' => 'PKN',
            'logo' => 'PKN.png'
        ]);

        Kendaraan::create([
            'nama' => 'Partai Hati Nurani Rakyat',
            'nama_singkat' => 'Hanura',
            'logo' => 'Hanura.png'
        ]);

        Kendaraan::create([
            'nama' => 'Partai Garuda Perubahan Indonesia',
            'nama_singkat' => 'Garuda',
            'logo' => 'Garuda.png'
        ]);

        Kendaraan::create([
            'nama' => 'Partai Amanat Nasional',
            'nama_singkat' => 'PAN',
            'logo' => 'PAN.png'
        ]);

        Kendaraan::create([
            'nama' => 'Partai Bulan Bintang',
            'nama_singkat' => 'PBB',
            'logo' => 'PBB.png'
        ]);

        Kendaraan::create([
            'nama' => 'Partai Persatuan Pembangunan',
            'nama_singkat' => 'PPP',
            'logo' => 'PPP.png'
        ]);

        Kendaraan::create([
            'nama' => 'Partai Demokrat',
            'nama_singkat' => 'Demokrat',
            'logo' => 'Demokrat.png'
        ]);

        Kendaraan::create([
            'nama' => 'Partai Solidaritas Indonesia',
            'nama_singkat' => 'PSI',
            'logo' => 'PSI.png'
        ]);

        Kendaraan::create([
            'nama' => 'Partai Perindo',
            'nama_singkat' => 'Perindo',
            'logo' => 'Perindo.png'
        ]);

        Kendaraan::create([
            'nama' => 'Partai Demo/Latihan',
            'nama_singkat' => 'demo',
            'logo' => 'demo.png'
        ]);


        LevelStatus::create([
            'level' => 1,
            'nama' => 'Penjaringan',
        ]);

        LevelStatus::create([
            'level' => 2,
            'nama' => 'Pengembira',
        ]);

        LevelStatus::create([
            'level' => 3,
            'nama' => 'Pragmatis',
        ]);

        LevelStatus::create([
            'level' => 4,
            'nama' => 'Loyalis',
        ]);

        LevelStatus::create([
            'level' => 5,
            'nama' => 'Militansi',
        ]);

        LevelStatus::create([
            'level' => 10,
            'nama' => 'Pindah arus',
        ]);


          // kecamatan bunaken
          DB::statement("INSERT INTO wilayah (id, parent_id,nama,level_wilayah,level_label,kode_prov,kode_kab,kode_kec,kode_kel,zona_waktu,created_at,updated_at,flag_hide,kode_wilayah) VALUES
          
          (512394896,71,'KOTA MANADO','2','kabupaten','71','7171','717100','7171000000','WITA',NULL,NULL,0,'71.71'),
          (246113159,7171,'BUNAKEN','3','kecamatan','71','7171','717101','7171010000','WITA',NULL,NULL,0,'71.71.01'),
          (511471168,717101,'MOLAS','4','kelurahan','71','7171','717101','7171011001','WITA',NULL,NULL,0,'71.71.01.1001'),
          (102846598,717101,'TONGKAINA','4','kelurahan','71','7171','717101','7171011006','WITA',NULL,NULL,0,'71.71.01.1006'),
          (964739840,717101,'MERAS','4','kelurahan','71','7171','717101','7171011007','WITA',NULL,NULL,0,'71.71.01.1007'),
          (578881054,717101,'BAILANG','4','kelurahan','71','7171','717101','7171011008','WITA',NULL,NULL,0,'71.71.01.1008'),
          (407132750,717101,'PANDU','4','kelurahan','71','7171','717101','7171011009','WITA',NULL,NULL,0,'71.71.01.1009'),
          (109881341,7171,'TUMINITING','3','kecamatan','71','7171','717102','7171020000','WITA',NULL,NULL,0,'71.71.02'),
          (295214720,717102,'BITUNG KARANGRIA','4','kelurahan','71','7171','717102','7171021001','WITA',NULL,NULL,0,'71.71.02.1001'),
          (863404724,717102,'TUMINTING','4','kelurahan','71','7171','717102','7171021002','WITA',NULL,NULL,0,'71.71.02.1002'),
  
          (672774572,717102,'TUMUMPA SATU','4','kelurahan','71','7171','717102','7171021003','WITA',NULL,NULL,0,'71.71.02.1003'),
          (471078631,717102,'MAASING','4','kelurahan','71','7171','717102','7171021004','WITA',NULL,NULL,0,'71.71.02.1004'),
          (551272034,717102,'SINDULANG SATU','4','kelurahan','71','7171','717102','7171021005','WITA',NULL,NULL,0,'71.71.02.1005'),
          (630947744,717102,'SINDULANG DUA','4','kelurahan','71','7171','717102','7171021006','WITA',NULL,NULL,0,'71.71.02.1006'),
          (886276974,717102,'ISLAM','4','kelurahan','71','7171','717102','7171021007','WITA',NULL,NULL,0,'71.71.02.1007'),
          (608967977,717102,'TUMUMPA DUA','4','kelurahan','71','7171','717102','7171021008','WITA',NULL,NULL,0,'71.71.02.1008'),
          (341129420,717102,'SUMOMPO','4','kelurahan','71','7171','717102','7171021009','WITA',NULL,NULL,0,'71.71.02.1009'),
          (233565122,717102,'MAHAWU','4','kelurahan','71','7171','717102','7171021010','WITA',NULL,NULL,0,'71.71.02.1010'),
          (550321315,7171,'SINGKIL','3','kecamatan','71','7171','717103','7171030000','WITA',NULL,NULL,0,'71.71.03'),
          (462417514,717103,'SINGKIL SATU','4','kelurahan','71','7171','717103','7171031001','WITA',NULL,NULL,0,'71.71.03.1001'),
  
          (741978389,717103,'SINGKIL DUA','4','kelurahan','71','7171','717103','7171031002','WITA',NULL,NULL,0,'71.71.03.1002'),
          (838192113,717103,'WAWONASA','4','kelurahan','71','7171','717103','7171031003','WITA',NULL,NULL,0,'71.71.03.1003'),
          (732962266,717103,'KARAME','4','kelurahan','71','7171','717103','7171031004','WITA',NULL,NULL,0,'71.71.03.1004'),
          (879184184,717103,'KETANG BARU','4','kelurahan','71','7171','717103','7171031005','WITA',NULL,NULL,0,'71.71.03.1005'),
          (765720501,717103,'TERNATE BARU','4','kelurahan','71','7171','717103','7171031006','WITA',NULL,NULL,0,'71.71.03.1006'),
          (103746056,717103,'KOMBOS BARAT','4','kelurahan','71','7171','717103','7171031007','WITA',NULL,NULL,0,'71.71.03.1007'),
          (398552379,717103,'KOMBOS TIMUR','4','kelurahan','71','7171','717103','7171031008','WITA',NULL,NULL,0,'71.71.03.1008'),
          (226524740,717103,'TERNATE TANJUNG','4','kelurahan','71','7171','717103','7171031009','WITA',NULL,NULL,0,'71.71.03.1009'),
          (875274962,7171,'WENANG','3','kecamatan','71','7171','717104','7171040000','WITA',NULL,NULL,0,'71.71.04'),
          (674401999,717104,'TIKALA KUMARAKA','4','kelurahan','71','7171','717104','7171041001','WITA',NULL,NULL,0,'71.71.04.1001'),
  
          (852921569,717104,'MAHAKERET TIMUR','4','kelurahan','71','7171','717104','7171041002','WITA',NULL,NULL,0,'71.71.04.1002'),
          (789627889,717104,'MAHAKERET BARAT','4','kelurahan','71','7171','717104','7171041003','WITA',NULL,NULL,0,'71.71.04.1003'),
          (521127446,717104,'TELING BAWAH','4','kelurahan','71','7171','717104','7171041004','WITA',NULL,NULL,0,'71.71.04.1004'),
          (246845614,717104,'WENANG UTARA','4','kelurahan','71','7171','717104','7171041005','WITA',NULL,NULL,0,'71.71.04.1005'),
          (486370626,717104,'WENANG SELATAN','4','kelurahan','71','7171','717104','7171041006','WITA',NULL,NULL,0,'71.71.04.1006'),
          (243047547,717104,'PINAESAAN','4','kelurahan','71','7171','717104','7171041007','WITA',NULL,NULL,0,'71.71.04.1007'),
          (530983313,717104,'CALACA','4','kelurahan','71','7171','717104','7171041008','WITA',NULL,NULL,0,'71.71.04.1008'),
          (818029219,717104,'ISTIQLAL','4','kelurahan','71','7171','717104','7171041009','WITA',NULL,NULL,0,'71.71.04.1009'),
          (574789441,717104,'LAWANGIRUNG','4','kelurahan','71','7171','717104','7171041010','WITA',NULL,NULL,0,'71.71.04.1010'),
          (700914346,717104,'KOMO LUAR','4','kelurahan','71','7171','717104','7171041011','WITA',NULL,NULL,0,'71.71.04.1011'),
  
          (574725113,717104,'BUMI BERINGIN','4','kelurahan','71','7171','717104','7171041012','WITA',NULL,NULL,0,'71.71.04.1012'),
          (428270501,7171,'TIKALA','3','kecamatan','71','7171','717105','7171050000','WITA',NULL,NULL,0,'71.71.05'),
          (692029261,717105,'TIKALA BARU','4','kelurahan','71','7171','717105','7171051008','WITA',NULL,NULL,0,'71.71.05.1008'),
          (254674863,717105,'TAAS','4','kelurahan','71','7171','717105','7171051009','WITA',NULL,NULL,0,'71.71.05.1009'),
          (323756832,717105,'PAAL IV','4','kelurahan','71','7171','717105','7171051010','WITA',NULL,NULL,0,'71.71.05.1010'),
          (350597472,717105,'BANJER','4','kelurahan','71','7171','717105','7171051011','WITA',NULL,NULL,0,'71.71.05.1011'),
          (717870114,717105,'TIKALA ARES','4','kelurahan','71','7171','717105','7171051012','WITA',NULL,NULL,0,'71.71.05.1012'),
          (872248444,7171,'SARIO','3','kecamatan','71','7171','717106','7171060000','WITA',NULL,NULL,0,'71.71.06'),
          (323367354,717106,'SARIO UTARA','4','kelurahan','71','7171','717106','7171061001','WITA',NULL,NULL,0,'71.71.06.1001'),
          (689565943,717106,'SARIO KOTABARU','4','kelurahan','71','7171','717106','7171061002','WITA',NULL,NULL,0,'71.71.06.1002'),
  
          (524257445,717106,'SARIO TUMPAAN','4','kelurahan','71','7171','717106','7171061003','WITA',NULL,NULL,0,'71.71.06.1003'),
          (994525049,717106,'SARIO','4','kelurahan','71','7171','717106','7171061004','WITA',NULL,NULL,0,'71.71.06.1004'),
          (198311629,717106,'TITIWUNGAN UTARA','4','kelurahan','71','7171','717106','7171061005','WITA',NULL,NULL,0,'71.71.06.1005'),
          (903525530,717106,'TITIWUNGAN SELATAN','4','kelurahan','71','7171','717106','7171061006','WITA',NULL,NULL,0,'71.71.06.1006'),
          (890605314,717106,'RANOTANA','4','kelurahan','71','7171','717106','7171061007','WITA',NULL,NULL,0,'71.71.06.1007'),
          (649058772,7171,'WANEA','3','kecamatan','71','7171','717107','7171070000','WITA',NULL,NULL,0,'71.71.07'),
          (966369303,717107,'WANEA','4','kelurahan','71','7171','717107','7171071001','WITA',NULL,NULL,0,'71.71.07.1001'),
          (525901324,717107,'TANJUNG BATU','4','kelurahan','71','7171','717107','7171071002','WITA',NULL,NULL,0,'71.71.07.1002'),
          (221857012,717107,'PAKOWA','4','kelurahan','71','7171','717107','7171071003','WITA',NULL,NULL,0,'71.71.07.1003'),
          (769211659,717107,'BUMI NYIUR','4','kelurahan','71','7171','717107','7171071004','WITA',NULL,NULL,0,'71.71.07.1004'),
  
          (349380091,717107,'RANOTANA WERU','4','kelurahan','71','7171','717107','7171071005','WITA',NULL,NULL,0,'71.71.07.1005'),
          (692484772,717107,'TELING ATAS','4','kelurahan','71','7171','717107','7171071006','WITA',NULL,NULL,0,'71.71.07.1006'),
          (198428680,717107,'TINGKULU','4','kelurahan','71','7171','717107','7171071007','WITA',NULL,NULL,0,'71.71.07.1007'),
          (730270535,717107,'KAROMBASAN UTARA','4','kelurahan','71','7171','717107','7171071008','WITA',NULL,NULL,0,'71.71.07.1008'),
          (846351904,717107,'KAROMBASAN SELATAN','4','kelurahan','71','7171','717107','7171071009','WITA',NULL,NULL,0,'71.71.07.1009'),
          (726291026,7171,'MAPANGET','3','kecamatan','71','7171','717108','7171080000','WITA',NULL,NULL,0,'71.71.08'),
          (603397953,717108,'PANIKI BAWAH','4','kelurahan','71','7171','717108','7171081001','WITA',NULL,NULL,0,'71.71.08.1001'),
          (111390116,717108,'LAPANGAN','4','kelurahan','71','7171','717108','7171081002','WITA',NULL,NULL,0,'71.71.08.1002'),
          (171362438,717108,'MAPANGET BARAT','4','kelurahan','71','7171','717108','7171081003','WITA',NULL,NULL,0,'71.71.08.1003'),
          (774619590,717108,'KIMA ATAS','4','kelurahan','71','7171','717108','7171081004','WITA',NULL,NULL,0,'71.71.08.1004'),
  
          (326509154,717108,'BUHA','4','kelurahan','71','7171','717108','7171081005','WITA',NULL,NULL,0,'71.71.08.1005'),
          (607478454,717108,'BENGKOL','4','kelurahan','71','7171','717108','7171081006','WITA',NULL,NULL,0,'71.71.08.1006'),
          (825894618,717108,'KAIRAGI SATU','4','kelurahan','71','7171','717108','7171081008','WITA',NULL,NULL,0,'71.71.08.1008'),
          (880914059,717108,'KAIRAGI DUA','4','kelurahan','71','7171','717108','7171081009','WITA',NULL,NULL,0,'71.71.08.1009'),
          (107333537,717108,'PANIKI SATU','4','kelurahan','71','7171','717108','7171081010','WITA',NULL,NULL,0,'71.71.08.1010'),
          (482775972,717108,'PANIKI DUA','4','kelurahan','71','7171','717108','7171081011','WITA',NULL,NULL,0,'71.71.08.1011'),
          (215099411,7171,'MALALAYANG','3','kecamatan','71','7171','717109','7171090000','WITA',NULL,NULL,0,'71.71.09'),
          (536676904,717109,'MALALAYANG SATU','4','kelurahan','71','7171','717109','7171091001','WITA',NULL,NULL,0,'71.71.09.1001'),
          (101402426,717109,'BAHU','4','kelurahan','71','7171','717109','7171091002','WITA',NULL,NULL,0,'71.71.09.1002'),
          (440726593,717109,'KLEAK','4','kelurahan','71','7171','717109','7171091003','WITA',NULL,NULL,0,'71.71.09.1003'),
  
          (444972366,717109,'BATU KOTA','4','kelurahan','71','7171','717109','7171091004','WITA',NULL,NULL,0,'71.71.09.1004'),
          (350045097,717109,'MALALAYANG SATU TIMUR','4','kelurahan','71','7171','717109','7171091005','WITA',NULL,NULL,0,'71.71.09.1005'),
          (894724465,717109,'MALALAYANG SATU BARAT','4','kelurahan','71','7171','717109','7171091006','WITA',NULL,NULL,0,'71.71.09.1006'),
          (580602932,717109,'MALALAYANG DUA','4','kelurahan','71','7171','717109','7171091007','WITA',NULL,NULL,0,'71.71.09.1007'),
          (306643917,717109,'WINANGUN SATU','4','kelurahan','71','7171','717109','7171091008','WITA',NULL,NULL,0,'71.71.09.1008'),
          (964909596,717109,'WINANGUN DUA','4','kelurahan','71','7171','717109','7171091009','WITA',NULL,NULL,0,'71.71.09.1009'),
          (345463227,7171,'BUNAKEN KEPULAUAN','3','kecamatan','71','7171','717110','7171100000','WITA',NULL,NULL,0,'71.71.10'),
          (309500742,717110,'BUNAKEN','4','kelurahan','71','7171','717110','7171101001','WITA',NULL,NULL,0,'71.71.10.1001'),
          (284519995,717110,'MANADO TUA SATU','4','kelurahan','71','7171','717110','7171101002','WITA',NULL,NULL,0,'71.71.10.1002'),
          (392778342,717110,'MANADO TUA DUA','4','kelurahan','71','7171','717110','7171101003','WITA',NULL,NULL,0,'71.71.10.1003'),
  
          (571109477,717110,'ALUNG BANUA','4','kelurahan','71','7171','717110','7171101004','WITA',NULL,NULL,0,'71.71.10.1004'),
          (777619204,7171,'PAAL DUA','3','kecamatan','71','7171','717111','7171110000','WITA',NULL,NULL,0,'71.71.11'),
          (119505822,717111,'RANOMUUT','4','kelurahan','71','7171','717111','7171111001','WITA',NULL,NULL,0,'71.71.11.1001'),
          (847827671,717111,'KAIRAGI WERU','4','kelurahan','71','7171','717111','7171111002','WITA',NULL,NULL,0,'71.71.11.1002'),
          (647151291,717111,'PAAL DUA','4','kelurahan','71','7171','717111','7171111003','WITA',NULL,NULL,0,'71.71.11.1003'),
          (663382855,717111,'PERKAMIL','4','kelurahan','71','7171','717111','7171111004','WITA',NULL,NULL,0,'71.71.11.1004'),
          (469776664,717111,'MALENDENG','4','kelurahan','71','7171','717111','7171111005','WITA',NULL,NULL,0,'71.71.11.1005'),
          (897349703,717111,'DENDENGAN DALAM','4','kelurahan','71','7171','717111','7171111006','WITA',NULL,NULL,0,'71.71.11.1006'),
          (584251867,717111,'DENDENGAN LUAR','4','kelurahan','71','7171','717111','7171111007','WITA',NULL,NULL,0,'71.71.11.1007');
          
      ");
  



    }
    
}
