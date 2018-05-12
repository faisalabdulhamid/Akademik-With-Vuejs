<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Pegawai::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'nip'              => $faker->unique()->isbn10,
        'nama'             => $faker->name,
        'jenis_kelamin'    => ['Laki-laki', 'Perempuan'][rand(0, 1)],
        'tempat_lahir'     => $faker->city,
        'tanggal_lahir'    => $faker->date(),
        'alamat'           => $faker->address,
        'telepon'          => $faker->creditCardNumber,
        'diterima_tanggal' => $faker->date(),
        'password'         => $password ?: $password = bcrypt('123456'),
        'remember_token'   => str_random(10),
    ];
});

$factory->define(App\Models\Siswa::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'nis'              => $faker->unique()->isbn10,
        'nisn'             => $faker->unique()->isbn10,
        'nama'             => $faker->name,
        'jenis_kelamin'    => ['Laki-laki', 'Perempuan'][rand(0, 1)],
        'tempat_lahir'     => $faker->city,
        'tanggal_lahir'    => $faker->date(),
        'anak_ke'          => $faker->numberBetween(0, 5),
        'status_keluarga'  => ['Anak Kandung', 'Anak Angkat'][rand(0, 1)],
        'alamat'           => $faker->address,
        'diterima_grade'   => $faker->numberBetween(1, 3),
        'diterima_tanggal' => $faker->date(),
        'asal_sekolah'     => $faker->city,
        'tahun_ijazah'     => '2014',
        'nomor_ijazah'     => $faker->unique()->isbn10,
        'telepon'          => $faker->creditCardNumber,
        'email'            => $faker->unique()->safeEmail,
        'password'         => $password ?: $password = bcrypt('123456'),
//        'remember_token' => str_random(10),
    ];
});
