<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\School as Schools;

class School extends Component
{
    use WithPagination;
    public $npsn, $school_name, $address, $city_regency, $province;
    public $paginate = 5;
    public $search = '';
    public $province_arr = [
        'Aceh' => [
            'Kabupaten Aceh Barat',
            'Kabupaten Aceh Barat Daya',
            'Kabupaten Aceh Besar',
            'Kabupaten Aceh Jaya',
            'Kabupaten Aceh Selatan',
            'Kabupaten Aceh Singkil',
            'Kabupaten Aceh Tamiang',
            'Kabupaten Aceh Tengah',
            'Kabupaten Aceh Tenggara',
            'Kabupaten Aceh Timur',
            'Kabupaten Aceh Utara',
            'Kabupaten Bener Meriah',
            'Kabupaten Bireuen',
            'Kabupaten Gayo Lues',
            'Kabupaten Nagan Raya',
            'Kabupaten Pidie',
            'Kabupaten Pidie Jaya',
            'Kabupaten Simeulue',
            'Kota Banda Aceh',
            'Kota Langsa',
            'Kota Lhokseumawe',
            'Kota Sabang',
            'Kota Subulussalam',
        ],
        'Bali' => [
            'Kabupaten Badung',
            'Kabupaten Bangil',
            'Kabupaten Buleleng',
            'Kabupaten Gianyar',
            'Kabupaten Jembrana',
            'Kabupaten Karangasem',
            'Kabupaten Klungkung',
            'Kabupaten Tabanan',
            'Kota Denpasar',
        ],
        'Banten' => [
            'Kabupaten Lebak',
            'Kabupaten Pandeglang',
            'Kabupaten Serang',
            'Kabupaten Tangerang',
            'Kota Cilegon',
            'Kota Serang',
            'Kota Tangerang',
            'Kota Tangerang selatan',
        ],
        'Bengkulu' => [
            'Kabupaten Bengkulu Selatan',
            'Kabupaten Bemgkulu Tengah',
            'Kabupaten Bengkulu Utara',
            'Kabupaten Kaur',
            'Kabupaten kapahiang',
            'Kabupaten Lebong',
            'Kabupaten Mukomuko',
            'Kabupaten Rejang Lebong',
            'Kabupaten seluma',
            'Kota Bengkulu',
        ],
        'D.I Yogyakarta' => [
            'Kabupaten Bantul',
            'Kabupaten Gunung kildul',
            'Kabupaten Kulon Progo',
            'Kabupaten Sleman',
            'Kota Yogyakarta',
        ],
        'D.K.I Jakarta' => [
            'Kabupaten Kepulauan Seribu',
            'Kota Jakarta Barat',
            'Kota Jakarta Pusat',
            'Kota Jakarta Selatan',
            'Kota Jakarta Timur',
            'Kota Jakarta Utara',
        ],
        'Gorontalo' => [
            'Kabupaten Boalemo',
            'Kabupaten Bone Bolango',
            'Kabupaten Gorontalo',
            'Kabupaten gorontalo Utara',
            'Kabupaten Pahuwato',
            'Kota Gorontalo',
        ],
        'Jambi' => [
            'Kabupaten Batanghari',
            'Kabupaten Bungo',
            'Kabupaten Kerinci',
            'Kabupaten Merangin',
            'Kabupaten Muaro Jambi',
            'Kabupaten Sarolangun',
            'Kabupaten Tanjung Jabung Barat',
            'Kabupaten Tanjung Jabung Timur',
            'Kabupaten Tebo',
            'Kota Jambi',
            'Kota Sungai Penuh',
        ],
        'Jawa Barat' => [
            'Kabupaten Bandung',
            'Kabupaten Bandung Barat',
            'Kabupaten Bekasi',
            'Kabupaten Bogor',
            'Kabupaten Ciamis',
            'Kabupaten Cianjur',
            'Kabupaten Cirebon',
            'Kabupaten Garut',
            'Kabupaten Indramayu',
            'Kabupaten Karawang',
            'Kabupaten Kuningan',
            'Kabupaten Majalengka',
            'Kabupaten Pangandaran',
            'Kabupaten Purwakarta',
            'Kabupaten Subang',
            'Kabupaten Sukabumi',
            'Kabupaten Sumedang',
            'Kabupaten Tasikmalaya',
            'Kota Bandung',
            'Kota Banjar',
            'Kota Bekasi',
            'Kota Bogor',
            'Kota Cimahi',
            'Kota Cirebon',
            'Kota Depok',
            'Kota Sukabumi',
            'Kota Tasikmalaya',
        ],
        'Jawa Tengah' => [
            'Kabupaten Banjarnegara',
            'Kabupaten Banyumas',
            'Kabupaten Batang',
            'Kabupaten Blora',
            'Kabupaten Boyolali',
            'Kabupaten Brebes',
            'Kabupaten Cilacap',
            'Kabupaten Demak',
            'Kabupaten Grobogan',
            'Kabupaten Jepara',
            'Kabupaten Karanganyar',
            'Kabupaten Kebumen',
            'Kabupaten Kendal',
            'Kabupaten Klaten',
            'Kabupaten Kudus',
            'Kabupaten Magelang',
            'Kabupaten Pati',
            'Kabupaten Pekalongan',
            'Kabupaten Pemalang',
            'Kabupaten Purbalingga',
            'Kabupaten Purworejo',
            'Kabupaten Rembang',
            'Kabupaten Semarang',
            'Kabupaten Sragen',
            'Kabupaten Sukoharjo',
            'Kabupaten Tegal',
            'Kabupaten Temanggung',
            'Kabupaten Wonogiri',
            'Kabupaten Wonosobo',
            'Kota Magelang',
            'Kota Pekalongan',
            'Kota Salatiga',
            'Kota Semarang',
            'Kota Surakarta',
            'Kota Tegal',
        ],
        'Jawa Timur' => [
            'Kabupaten Bangkalan',
            'Kabupaten Banyuwangi',
            'Kabupaten Blitar',
            'Kabupaten Bojonegoro',
            'Kabupaten Bondowoso',
            'Kabupaten Gresik',
            'Kabupaten Jember',
            'Kabupaten Jombang',
            'Kabupaten Kediri',
            'Kabupaten Lamongan',
            'Kabupaten Lumajang',
            'Kabupaten Madiun',
            'Kabupaten Magetan',
            'Kabupaten Malang',
            'Kabupaten Mojokerto',
            'Kabupaten Nganjuk',
            'Kabupaten Ngawi',
            'Kabupaten Pacitan',
            'Kabupaten Pamekasan',
            'Kabupaten Pasuruan',
            'Kabupaten Ponorogo',
            'Kabupaten Probolinggo',
            'Kabupaten Sampang',
            'Kabupaten Sidoarjo',
            'Kabupaten Situbondo',
            'Kabupaten Sumenep',
            'Kabupaten Trenggalek',
            'Kabupaten Tuban',
            'Kabupaten Tulungagung',
            'Kota Batu',
            'Kota Blitar',
            'Kota Kediri',
            'Kota Madiun',
            'Kota Malang',
            'Kota Mojokerto',
            'Kota Pasuruan',
            'Kota Probolinggo',
            'Kota Surabaya',
        ],
        'Kalimantan Barat' => [
            'Kabupaten Bengkayang',
            'Kabupaten Kapuas Hulu',
            'Kabupaten Kayong Utara',
            'Kabupaten Ketapang',
            'Kabupaten Kubu Raya',
            'Kabupaten Landak',
            'Kabupaten Melawi',
            'Kabupaten Pontianak',
            'Kabupaten Sambas',
            'Kabupaten Sanggau',
            'Kabupaten Sekadau',
            'Kabupaten Sintang',
            'Kota Pontianak',
            'Kota Singkawang',
        ],
        'Kalimantan Selatan' => [
            'Kabupaten Balangan',
            'Kabupaten Banjar',
            'Kabupaten Barito Kuala',
            'Kabupaten Hulu Sungai Selatan',
            'Kabupaten Hulu Sungai Tengah',
            'Kabupaten Hulu Sungai Utara',
            'Kabupaten Kotabaru',
            'Kabupaten Tabalong',
            'Kabupaten Tanah Bumbu',
            'Kabupaten Tanah Laut',
            'Kabupaten Tapin',
            'Kota Banjarbaru',
            'Kota Banjarmasin',
        ],
        'Kalimantan Tengah' => [
            'Kabupaten Barito Selatan',
            'Kabupaten Barito Timur',
            'Kabupaten Barito Utara',
            'Kabupaten Gunung Mas',
            'Kabupaten Kapuas',
            'Kabupaten Katingan',
            'Kabupaten Kotawaringin Barat',
            'Kabupaten Kotawaringin Timur',
            'Kabupaten Lamandau',
            'Kabupaten Murung Raya',
            'Kabupaten Pulang Pisau',
            'Kabupaten Sukamara',
            'Kabupaten Seruyan',
            'Kota Palangka Raya',
        ],
        'Kalimantan Timur' => [
            'Kabupaten Berau',
            'Kabupaten Kutai Barat',
            'Kabupaten Kutai Kartanegara',
            'Kabupaten Kutai Timur',
            'Kabupaten Paser',
            'Kabupaten Penajam Paser Utara',
            'Kabupaten Mahakam Ulu',
            'Kota Balikpapan',
            'Kota Bontang',
            'Kota Samarinda',
        ],
        'Kalimantan Utara' => [
            'Kabupaten Bulungan',
            'Kabupaten Malinau',
            'Kabupaten Nunukan',
            'Kabupaten Tana Tidung',
            'Kota Tarakan',
        ],
        'Kepulauan Bangka Belitung' => [
            'Kabupaten Bangka',
            'Kabupaten Bangka Barat',
            'Kabupaten Bangka Selatan',
            'Kabupaten Bangka Tengah',
            'Kabupaten Belitung',
            'Kabupaten Belitung Timur',
            'Kota Pangkal Pinang',
        ],
        'Kepulauan Riau' => [
            'Kabupaten Bintan',
            'Kabupaten Karimun',
            'Kabupaten Kepulauan Anambas',
            'Kabupaten Lingga',
            'Kabupaten Natuna',
            'Kota Batam',
            'Kota Tanjung Pinang',
        ],
        'Lampung' => [
            'Kabupaten Lampung Barat',
            'Kabupaten Lampung Selatan',
            'Kabupaten Lampung Tengah',
            'Kabupaten Lampung Timur',
            'Kabupaten Lampung Utara',
            'Kabupaten Mesuji',
            'Kabupaten Pesawaran',
            'Kabupaten Pringsewu',
            'Kabupaten Tanggamus',
            'Kabupaten Tulang Bawang',
            'Kabupaten Tulang Bawang Barat',
            'Kabupaten Way Kanan',
            'Kabupaten Pesisir Barat',
            'Kota Bandar Lampung',
            'Kota Kotabumi',
            'Kota Liwa',
            'Kota Metro',
        ],
        'Maluku' => [
            'Kabupaten Buru',
            'Kabupaten Buru Selatan',
            'Kabupaten Kepulauan Aru',
            'Kabupaten Maluku Barat Daya',
            'Kabupaten Maluku Tengah',
            'Kabupaten Maluku Tenggara',
            'Kabupaten Maluku Tenggara Barat',
            'Kabupaten Seram Bagian Barat',
            'Kabupaten Seram Bagian Timur',
            'Kota Ambon',
            'Kota Tual',
        ],
        'Maluku Utara' => [
            'Kabupaten Halmahera Barat',
            'Kabupaten Halmahera Tengah',
            'Kabupaten Halmahera Utara',
            'Kabupaten Halmahera Selatan',
            'Kabupaten Halmahera Timur',
            'Kabupaten Kepulauan Sula',
            'Kabupaten Pulau Morotai',
            'Kabupaten Pulau Taliabu',
            'Kota Ternate',
            'Kota Tidore Kepulauan',
        ],
        'Nusa Tenggara Barat' => [
            'Kabupaten Bima',
            'Kabupaten Dompu',
            'Kabupaten Lombok Barat',
            'Kabupaten Lombok Tengah',
            'Kabupaten Lombok Timur',
            'Kabupaten Lombok Utara',
            'Kabupaten Sumbawa',
            'Kabupaten Sumbawa Barat',
            'Kota Bima',
            'Kota Mataram',
        ],
        'Nusa Tenggara Timur' => [
            'Kabupaten Alor',
            'Kabupaten Belu',
            'Kabupaten Ende',
            'Kabupaten Flores Timur',
            'Kabupaten Kupang',
            'Kabupaten Lembata',
            'Kabupaten Manggarai',
            'Kabupaten Manggarai Barat',
            'Kabupaten Manggarai Timur',
            'Kabupaten Ngada',
            'Kabupaten Nagekeo',
            'Kabupaten Rote Ndao',
            'Kabupaten Sabu Raijua',
            'Kabupaten Sikka',
            'Kabupaten Sumba Barat',
            'Kabupaten Sumba Barat Daya',
            'Kabupaten Sumba Tengah',
            'Kabupaten Sumba Timur',
            'Kabupaten Timor Tengah Selatan',
            'Kabupaten Timor Tengah Utara',
            'Kota Kupang',
        ],
        'Papua' => [
            'Kabupaten Asmat',
            'Kabupaten Biak Numfor',
            'Kabupaten Boven Digoel',
            'Kabupaten Deiyai',
            'Kabupaten Dogiyai',
            'Kabupaten Intan Jaya',
            'Kabupaten Jayapura',
            'Kabupaten Jayawijaya',
            'Kabupaten Keerom',
            'Kabupaten Kepulauan Yapen',
            'Kabupaten Lanny Jaya',
            'Kabupaten Mamberamo Raya',
            'Kabupaten Mamberamo Tengah',
            'Kabupaten Mappi',
            'Kabupaten Merauke',
            'Kabupaten Mimika',
            'Kabupaten Nabire',
            'Kabupaten Nduga',
            'Kabupaten Paniai',
            'Kabupaten Pegunungan Bintang',
            'Kabupaten Puncak',
            'Kabupaten Puncak Jaya',
            'Kabupaten Sarmi',
            'Kabupaten Supiori',
            'Kabupaten Tolikara',
            'Kabupaten Waropen',
            'Kabupaten Yahukimo',
            'Kabupaten Yalimo',
            'Kota Jayapura',
        ],
        'Papua Barat' => [
            'Kabupaten Fakfak',
            'Kabupaten Kaimana',
            'Kabupaten Manokwari',
            'Kabupaten Manokwari Selatan',
            'Kabupaten Maybrat',
            'Kabupaten Pegunungan Arfak',
            'Kabupaten Raja Ampat',
            'Kabupaten Sorong',
            'Kabupaten Sorong Selatan',
            'Kabupaten Tambrauw',
            'Kabupaten Teluk Bintuni',
            'Kabupaten Teluk Wondama',
            'Kota Sorong',
        ],
        'Riau' => [
            'Kabupaten Bengkalis',
            'Kabupaten Indragiri Hilir',
            'Kabupaten Indragiri Hulu',
            'Kabupaten Kampar',
            'Kabupaten Kuantan Singingi',
            'Kabupaten Pelalawan',
            'Kabupaten Rokan Hilir',
            'Kabupaten Rokan Hulu',
            'Kabupaten Siak',
            'Kabupaten Kepulauan Meranti',
            'Kota Dumai',
            'Kota Pekanbaru',
        ],
        'Sulawesi Barat' => [
            'Kabupaten Majene',
            'Kabupaten Mamasa',
            'Kabupaten Mamuju',
            'Kabupaten Mamuju Utara',
            'Kabupaten Polewali Mandar',
            'Kabupaten Mamuju Tengah',
        ],
        'Sulawesi Selatan' => [
            'Kabupaten Bantaeng',
            'Kabupaten Barru',
            'Kabupaten Bone	Watampone',
            'Kabupaten Bulukumba',
            'Kabupaten Enrekang',
            'Kabupaten Gowa',
            'Kabupaten Jeneponto',
            'Kabupaten Kepulauan Selayar',
            'Kabupaten Luwu',
            'Kabupaten Luwu Timur',
            'Kabupaten Luwu Utara',
            'Kabupaten Maros',
            'Kabupaten Pangkajene dan Kepulauan',
            'Kabupaten Pinrang',
            'Kabupaten Sidenreng Rappang',
            'Kabupaten Sinjai',
            'Kabupaten Soppeng',
            'Kabupaten Takalar',
            'Kabupaten Tana Toraja',
            'Kabupaten Toraja Utara',
            'Kabupaten Wajo',
            'Kota Makassar',
            'Kota Palopo',
            'Kota Parepare',
        ],
        'Sulawesi Tengah' => [
            'Kabupaten Banggai',
            'Kabupaten Banggai Kepulauan',
            'Kabupaten Banggai Laut',
            'Kabupaten Buol',
            'Kabupaten Donggala',
            'Kabupaten Morowali',
            'Kabupaten Parigi Moutong',
            'Kabupaten Poso',
            'Kabupaten Sigi',
            'Kabupaten Tojo Una-Una',
            'Kabupaten Tolitoli',
            'Kota Palu',
        ],
        'Sulawesi Tenggara' => [
            'Kabupaten Bombana',
            'Kabupaten Buton',
            'Kabupaten Buton Utara',
            'Kabupaten Kolaka',
            'Kabupaten Kolaka Timur',
            'Kabupaten Kolaka Utara',
            'Kabupaten Konawe',
            'Kabupaten Konawe Selatan',
            'Kabupaten Konawe Utara',
            'Kabupaten Konawe Kepulauan',
            'Kabupaten Muna',
            'Kabupaten Wakatobi',
            'Kota Bau-Bau',
            'Kota Kendari',
        ],
        'Sulawesi Utara' => [
            'Kabupaten Bolaang Mongondow',
            'Kabupaten Bolaang Mongondow Selatan',
            'Kabupaten Bolaang Mongondow Timur',
            'Kabupaten Bolaang Mongondow Utara',
            'Kabupaten Kepulauan Sangihe',
            'Kabupaten Kepulauan Siau Tagulandang Biaro',
            'Kabupaten Kepulauan Talaud',
            'Kabupaten Minahasa',
            'Kabupaten Minahasa Selatan',
            'Kabupaten Minahasa Tenggara',
            'Kabupaten Minahasa Utara',
            'Kota Bitung',
            'Kota Kotamobagu',
            'Kota Manado',
            'Kota Tomohon',
        ],
        'Sumatera Barat' => [
            'Kabupaten Agam',
            'Kabupaten Dharmasraya',
            'Kabupaten Kepulauan Mentawai',
            'Kabupaten Lima Puluh Kota',
            'Kabupaten Padang Pariaman',
            'Kabupaten Pasaman',
            'Kabupaten Pasaman Barat',
            'Kabupaten Pesisir Selatan',
            'Kabupaten Sijunjung',
            'Kabupaten Solok',
            'Kabupaten Solok Selatan',
            'Kabupaten Tanah Datar',
            'Kota Bukittinggi',
            'Kota Padang',
            'Kota Padangpanjang',
            'Kota Pariaman',
            'Kota Payakumbuh',
            'Kota Sawahlunto',
            'Kota Solok',
        ],
        'Sumatera Selatan' => [
            'Kabupaten Banyuasin',
            'Kabupaten Empat Lawang',
            'Kabupaten Lahat',
            'Kabupaten Muara Enim',
            'Kabupaten Musi Banyuasin',
            'Kabupaten Musi Rawas',
            'Kabupaten Ogan Ilir',
            'Kabupaten Ogan Komering Ilir',
            'Kabupaten Ogan Komering Ulu',
            'Kabupaten Ogan Komering Ulu Selatan',
            'Kabupaten Penukal Abab Lematang Ilir',
            'Kabupaten Ogan Komering Ulu Timur',
            'Kota Lubuklinggau',
            'Kota Pagar Alam',
            'Kota Palembang',
            'Kota Prabumulih',
        ],
        'Sumatera Utara' => [
            'Kabupaten Asahan',
            'Kabupaten Batubara',
            'Kabupaten Dairi',
            'Kabupaten Deli Serdang',
            'Kabupaten Humbang Hasundutan',
            'Kabupaten Karo	Kabanjahe',
            'Kabupaten Labuhanbatu',
            'Kabupaten Labuhanbatu Selatan',
            'Kabupaten Labuhanbatu Utara',
            'Kabupaten Langkat',
            'Kabupaten Mandailing Natal',
            'Kabupaten Nias',
            'Kabupaten Nias Barat',
            'Kabupaten Nias Selatan',
            'Kabupaten Nias Utara',
            'Kabupaten Padang Lawas',
            'Kabupaten Padang Lawas Utara',
            'Kabupaten Pakpak Bharat',
            'Kabupaten Samosir',
            'Kabupaten Serdang Bedagai',
            'Kabupaten Simalungun',
            'Kabupaten Tapanuli Selatan',
            'Kabupaten Tapanuli Tengah',
            'Kabupaten Tapanuli Utara',
            'Kabupaten Toba Samosir',
            'Kota Binjai',
            'Kota Gunungsitoli',
            'Kota Medan',
            'Kota Padangsidempuan',
            'Kota Pematangsiantar',
            'Kota Sibolga',
            'Kota Tanjungbalai',
            'Kota Tebing Tinggi',
        ],
    ];

    protected $rules = [
        'npsn' => 'required|unique:schools',
        'school_name' => 'required|unique:schools',
        'address' => 'required',
        'city_regency' => 'required',
        'province' => 'required',
    ];
    protected $messages = [
        'npsn.required' => 'NPSN tidak boleh kosong',
        'npsn.unique' => 'NPSN sudah terdaftar',
        'school_name.required' => 'Nama sekolah tidak boleh kosong',
        'school_name.unique' => 'Nama sekolah sudah terdaftar',
        'address.required' => 'Alamat tidak boleh kosong',
        'city_regency.required' => 'Kota/Kabupaten tidak boleh kosong',
        'province.required' => 'Provinsi tidak boleh kosong',
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function store()
    {
        $this->resetErrorBag();
        $validated = $this->validate();
        Schools::create($validated);
        session()->flash('success', 'School created successfully!');
        return redirect()->to('/schools');
        $this->reset();
        $this->resetInput();
    }
    public function edit(int $npsn)
    {
        $school = Schools::find($npsn);
        if ($school) {
            $this->npsn = $school->npsn;
            $this->school_name = $school->school_name;
            $this->address = $school->address;
            $this->city_regency = $school->city_regency;
            $this->province = $school->province;
        } else {
            return redirect()->to('/schools');
        }
    }
    public function update()
    {
        $this->resetErrorBag();
        $rules = [
            'npsn' => 'required',
            'school_name' => 'required',
            'address' => 'required',
            'city_regency' => 'required',
            'province' => 'required',
        ];

        if ('school_name' == $this->school_name) {
            $rules['npsn'] = 'required|unique:schools';
            $rules['school_name'] = 'required|unique:schools';
            $rules['address'] = 'required';
            $rules['city_regency'] = 'required';
            $rules['province'] = 'required';
        }
        $validated = $this->validate($rules, [
            'npsn.required' => 'NPSN tidak boleh kosong',
            'npsn.unique' => 'NPSN sudah terdaftar',
            'school_name.required' => 'Nama sekolah tidak boleh kosong',
            'school_name.unique' => 'Nama sekolah sudah terdaftar',
            'address.required' => 'Alamat tidak boleh kosong',
            'city_regency.required' => 'Kota/Kabupaten tidak boleh kosong',
            'province.required' => 'Provinsi tidak boleh kosong',
        ]);
        Schools::where('npsn', $this->npsn)->update([
            'npsn' => $validated['npsn'],
            'school_name' => $validated['school_name'],
            'address' => $validated['address'],
            'city_regency' => $validated['city_regency'],
            'province' => $validated['province'],
        ]);
        session()->flash('success', 'School updated successfully!');
        return redirect()->to('/schools');
        $this->reset();
        $this->resetInput();
    }
    public function delete(int $npsn)
    {
        $this->npsn = $npsn;
    }
    public function destroy()
    {
        $school = Schools::find($this->npsn)->delete();
        session()->flash('success', 'School deleted successfully!');
        return redirect()->to('/schools');
        $this->reset();
        $this->resetInput();
    }
    public function closeModal()
    {
        $this->resetErrorBag();
        $this->resetInput();
    }
    public function resetInput()
    {
        $this->npsn = '';
        $this->school_name = '';
        $this->address = '';
        $this->city_regency = '';
        $this->province = '';
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function clearSearch()
    {
        $this->search = '';
    }
    public function render()
    {
        return view('livewire.schools.school', [
            'schools' =>  Schools::where('school_name', 'like', '%' . $this->search . '%')
                ->orWhere('address', 'like', '%' . $this->search . '%')
                ->paginate($this->paginate),
            'count' => Schools::all()->count(),
            'titles' => 'schools',
            'title' => 'school'
        ]);
    }
}
