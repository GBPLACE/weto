<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('countries')->delete();

        \DB::table('countries')->insert(array (
            0 =>
            array (
                'id' => 1,
                'country' => 'Afghanistan',
                'created_at' => '2020-08-17 07:33:02',
                'updated_at' => '2020-08-17 07:33:02',
            ),
            1 =>
            array (
                'id' => 5,
                'country' => 'Albania',
                'created_at' => '2020-08-17 06:53:04',
                'updated_at' => '2020-08-17 06:53:04',
            ),
            2 =>
            array (
                'id' => 6,
                'country' => 'Algeria',
                'created_at' => '2020-08-17 07:17:31',
                'updated_at' => '2020-08-17 07:19:19',
            ),
            3 =>
            array (
                'id' => 7,
                'country' => 'Andorra',
                'created_at' => '2020-09-24 00:11:18',
                'updated_at' => '2020-09-24 00:11:18',
            ),
            4 =>
            array (
                'id' => 8,
                'country' => 'Angola',
                'created_at' => '2020-09-24 00:11:29',
                'updated_at' => '2020-09-24 00:11:29',
            ),
            5 =>
            array (
                'id' => 9,
                'country' => 'Antigua and Barbuda',
                'created_at' => '2020-09-24 00:11:44',
                'updated_at' => '2020-09-24 00:11:44',
            ),
            6 =>
            array (
                'id' => 10,
                'country' => 'Argentina',
                'created_at' => '2020-09-24 00:11:54',
                'updated_at' => '2020-09-24 00:11:54',
            ),
            7 =>
            array (
                'id' => 11,
                'country' => 'Armenia',
                'created_at' => '2020-09-24 00:12:54',
                'updated_at' => '2020-09-24 00:12:54',
            ),
            8 =>
            array (
                'id' => 12,
                'country' => 'Australia',
                'created_at' => '2020-09-24 00:13:05',
                'updated_at' => '2020-09-24 00:13:05',
            ),
            9 =>
            array (
                'id' => 13,
                'country' => 'Austria',
                'created_at' => '2020-09-24 00:13:20',
                'updated_at' => '2020-09-24 00:13:20',
            ),
            10 =>
            array (
                'id' => 14,
                'country' => 'Azerbaijan',
                'created_at' => '2020-09-24 00:14:41',
                'updated_at' => '2020-09-24 00:14:41',
            ),
            11 =>
            array (
                'id' => 15,
                'country' => 'Bahamas',
                'created_at' => '2020-09-24 00:14:58',
                'updated_at' => '2020-09-24 00:14:58',
            ),
            12 =>
            array (
                'id' => 16,
                'country' => 'Bahrain',
                'created_at' => '2020-09-24 00:15:10',
                'updated_at' => '2020-09-24 00:15:10',
            ),
            13 =>
            array (
                'id' => 17,
                'country' => 'Bangladesh',
                'created_at' => '2020-09-24 00:15:18',
                'updated_at' => '2020-09-24 00:15:18',
            ),
            14 =>
            array (
                'id' => 18,
                'country' => 'Barbados',
                'created_at' => '2020-09-24 00:15:33',
                'updated_at' => '2020-09-24 00:15:33',
            ),
            15 =>
            array (
                'id' => 19,
                'country' => 'Belarus',
                'created_at' => '2020-09-24 00:15:45',
                'updated_at' => '2020-09-24 00:15:45',
            ),
            16 =>
            array (
                'id' => 20,
                'country' => 'Belgium',
                'created_at' => '2020-09-24 00:15:59',
                'updated_at' => '2020-09-24 00:15:59',
            ),
            17 =>
            array (
                'id' => 21,
                'country' => 'Belize',
                'created_at' => '2020-09-24 00:16:05',
                'updated_at' => '2020-09-24 00:16:05',
            ),
            18 =>
            array (
                'id' => 22,
                'country' => 'Benin',
                'created_at' => '2020-09-24 00:16:13',
                'updated_at' => '2020-09-24 00:16:13',
            ),
            19 =>
            array (
                'id' => 23,
                'country' => 'Bhutan',
                'created_at' => '2020-09-24 00:16:20',
                'updated_at' => '2020-09-24 00:16:20',
            ),
            20 =>
            array (
                'id' => 24,
                'country' => 'Bolivia',
                'created_at' => '2020-09-24 00:16:27',
                'updated_at' => '2020-09-24 00:16:27',
            ),
            21 =>
            array (
                'id' => 25,
                'country' => 'Bosnia and Herzegovina',
                'created_at' => '2020-09-24 00:16:34',
                'updated_at' => '2020-09-24 00:16:34',
            ),
            22 =>
            array (
                'id' => 26,
                'country' => 'Botswana',
                'created_at' => '2020-09-24 00:16:48',
                'updated_at' => '2020-09-24 00:16:48',
            ),
            23 =>
            array (
                'id' => 27,
                'country' => 'Brazil',
                'created_at' => '2020-09-24 00:16:54',
                'updated_at' => '2020-09-24 00:16:54',
            ),
            24 =>
            array (
                'id' => 28,
                'country' => 'Brunei',
                'created_at' => '2020-09-24 00:17:01',
                'updated_at' => '2020-09-24 00:17:01',
            ),
            25 =>
            array (
                'id' => 29,
                'country' => 'Bulgaria',
                'created_at' => '2020-09-24 00:17:18',
                'updated_at' => '2020-09-24 00:17:18',
            ),
            26 =>
            array (
                'id' => 30,
                'country' => 'Burkina Faso',
                'created_at' => '2020-09-24 00:17:29',
                'updated_at' => '2020-09-24 00:17:29',
            ),
            27 =>
            array (
                'id' => 31,
                'country' => 'Burundi',
                'created_at' => '2020-09-24 00:17:37',
                'updated_at' => '2020-09-24 00:17:37',
            ),
            28 =>
            array (
                'id' => 32,
                'country' => 'Côte d\'Ivoire',
                'created_at' => '2020-09-24 00:18:56',
                'updated_at' => '2020-09-24 00:18:56',
            ),
            29 =>
            array (
                'id' => 33,
                'country' => 'Cabo Verde',
                'created_at' => '2020-09-24 00:19:31',
                'updated_at' => '2020-09-24 00:19:31',
            ),
            30 =>
            array (
                'id' => 34,
                'country' => 'Cambodia',
                'created_at' => '2020-09-24 00:19:42',
                'updated_at' => '2020-09-24 00:19:42',
            ),
            31 =>
            array (
                'id' => 35,
                'country' => 'Cameroon',
                'created_at' => '2020-09-24 00:19:54',
                'updated_at' => '2020-09-24 00:19:54',
            ),
            32 =>
            array (
                'id' => 36,
                'country' => 'Canada',
                'created_at' => '2020-09-24 00:20:18',
                'updated_at' => '2020-09-24 00:20:18',
            ),
            33 =>
            array (
                'id' => 37,
                'country' => 'Central African Republic',
                'created_at' => '2020-09-24 00:20:29',
                'updated_at' => '2020-09-24 00:20:29',
            ),
            34 =>
            array (
                'id' => 38,
                'country' => 'Chad',
                'created_at' => '2020-09-24 00:20:41',
                'updated_at' => '2020-09-24 00:20:41',
            ),
            35 =>
            array (
                'id' => 39,
                'country' => 'Chile',
                'created_at' => '2020-09-24 00:20:47',
                'updated_at' => '2020-09-24 00:20:47',
            ),
            36 =>
            array (
                'id' => 40,
                'country' => 'China',
                'created_at' => '2020-09-24 00:20:55',
                'updated_at' => '2020-09-24 00:20:55',
            ),
            37 =>
            array (
                'id' => 41,
                'country' => 'Colombia',
                'created_at' => '2020-09-24 00:21:03',
                'updated_at' => '2020-09-24 00:21:03',
            ),
            38 =>
            array (
                'id' => 42,
                'country' => 'Comoros',
                'created_at' => '2020-09-24 00:21:10',
                'updated_at' => '2020-09-24 00:21:10',
            ),
            39 =>
            array (
                'id' => 43,
            'country' => 'Congo (Congo-Brazzaville)',
                'created_at' => '2020-09-24 00:21:27',
                'updated_at' => '2020-09-24 00:21:27',
            ),
            40 =>
            array (
                'id' => 44,
                'country' => 'Costa Rica',
                'created_at' => '2020-09-24 00:22:05',
                'updated_at' => '2020-09-24 00:22:05',
            ),
            41 =>
            array (
                'id' => 45,
                'country' => 'Croatia',
                'created_at' => '2020-09-24 00:22:44',
                'updated_at' => '2020-09-24 00:22:44',
            ),
            42 =>
            array (
                'id' => 46,
                'country' => 'Cuba',
                'created_at' => '2020-09-24 00:22:50',
                'updated_at' => '2020-09-24 00:22:50',
            ),
            43 =>
            array (
                'id' => 47,
                'country' => 'Cyprus',
                'created_at' => '2020-09-24 00:22:59',
                'updated_at' => '2020-09-24 00:22:59',
            ),
            44 =>
            array (
                'id' => 48,
            'country' => 'Czechia (Czech Republic)',
                'created_at' => '2020-09-24 00:27:13',
                'updated_at' => '2020-09-24 00:27:13',
            ),
            45 =>
            array (
                'id' => 49,
                'country' => 'Democratic Republic of the Congo',
                'created_at' => '2020-09-24 00:27:36',
                'updated_at' => '2020-09-24 00:27:36',
            ),
            46 =>
            array (
                'id' => 50,
                'country' => 'Denmark',
                'created_at' => '2020-09-24 00:27:45',
                'updated_at' => '2020-09-24 00:27:45',
            ),
            47 =>
            array (
                'id' => 51,
                'country' => 'Djibouti',
                'created_at' => '2020-09-24 00:27:50',
                'updated_at' => '2020-09-24 00:27:50',
            ),
            48 =>
            array (
                'id' => 52,
                'country' => 'Dominica',
                'created_at' => '2020-09-24 00:27:57',
                'updated_at' => '2020-09-24 00:27:57',
            ),
            49 =>
            array (
                'id' => 53,
                'country' => 'Dominican Republic',
                'created_at' => '2020-09-24 00:28:05',
                'updated_at' => '2020-09-24 00:28:05',
            ),
            50 =>
            array (
                'id' => 54,
                'country' => 'Ecuador',
                'created_at' => '2020-09-24 00:28:10',
                'updated_at' => '2020-09-24 00:28:10',
            ),
            51 =>
            array (
                'id' => 55,
                'country' => 'Egypt',
                'created_at' => '2020-09-24 00:28:16',
                'updated_at' => '2020-09-24 00:28:16',
            ),
            52 =>
            array (
                'id' => 56,
                'country' => 'El Salvador',
                'created_at' => '2020-09-24 00:28:23',
                'updated_at' => '2020-09-24 00:28:23',
            ),
            53 =>
            array (
                'id' => 57,
                'country' => 'Equatorial Guinea',
                'created_at' => '2020-09-24 00:28:30',
                'updated_at' => '2020-09-24 00:28:30',
            ),
            54 =>
            array (
                'id' => 58,
                'country' => 'Eritrea',
                'created_at' => '2020-09-24 00:28:38',
                'updated_at' => '2020-09-24 00:28:38',
            ),
            55 =>
            array (
                'id' => 59,
                'country' => 'Estonia',
                'created_at' => '2020-09-24 00:28:53',
                'updated_at' => '2020-09-24 00:28:53',
            ),
            56 =>
            array (
                'id' => 60,
            'country' => 'Eswatini (fmr. "Swaziland")',
                'created_at' => '2020-09-24 00:28:57',
                'updated_at' => '2020-09-24 00:28:57',
            ),
            57 =>
            array (
                'id' => 61,
                'country' => 'Ethiopia',
                'created_at' => '2020-09-24 00:29:13',
                'updated_at' => '2020-09-24 00:29:13',
            ),
            58 =>
            array (
                'id' => 62,
                'country' => 'Fiji',
                'created_at' => '2020-09-24 00:29:18',
                'updated_at' => '2020-09-24 00:29:18',
            ),
            59 =>
            array (
                'id' => 63,
                'country' => 'Finland',
                'created_at' => '2020-09-24 00:29:24',
                'updated_at' => '2020-09-24 00:29:24',
            ),
            60 =>
            array (
                'id' => 64,
                'country' => 'France',
                'created_at' => '2020-09-24 00:29:30',
                'updated_at' => '2020-09-24 00:29:30',
            ),
            61 =>
            array (
                'id' => 65,
                'country' => 'Gabon',
                'created_at' => '2020-09-24 00:29:36',
                'updated_at' => '2020-09-24 00:29:36',
            ),
            62 =>
            array (
                'id' => 66,
                'country' => 'Gambia',
                'created_at' => '2020-09-24 00:29:42',
                'updated_at' => '2020-09-24 00:29:42',
            ),
            63 =>
            array (
                'id' => 67,
                'country' => 'Georgia',
                'created_at' => '2020-09-24 00:29:48',
                'updated_at' => '2020-09-24 00:29:48',
            ),
            64 =>
            array (
                'id' => 68,
                'country' => 'Germany',
                'created_at' => '2020-09-24 00:29:54',
                'updated_at' => '2020-09-24 00:29:54',
            ),
            65 =>
            array (
                'id' => 69,
                'country' => 'Ghana',
                'created_at' => '2020-09-24 00:30:01',
                'updated_at' => '2020-09-24 00:30:01',
            ),
            66 =>
            array (
                'id' => 70,
                'country' => 'Greece',
                'created_at' => '2020-09-24 00:30:08',
                'updated_at' => '2020-09-24 00:30:08',
            ),
            67 =>
            array (
                'id' => 71,
                'country' => 'Grenada',
                'created_at' => '2020-09-24 00:30:15',
                'updated_at' => '2020-09-24 00:30:15',
            ),
            68 =>
            array (
                'id' => 72,
                'country' => 'Guatemala',
                'created_at' => '2020-09-24 00:30:21',
                'updated_at' => '2020-09-24 00:30:21',
            ),
            69 =>
            array (
                'id' => 73,
                'country' => 'Guinea',
                'created_at' => '2020-09-24 00:30:31',
                'updated_at' => '2020-09-24 00:30:31',
            ),
            70 =>
            array (
                'id' => 74,
                'country' => 'Guinea-Bissau',
                'created_at' => '2020-09-24 00:30:39',
                'updated_at' => '2020-09-24 00:30:39',
            ),
            71 =>
            array (
                'id' => 75,
                'country' => 'Guyana',
                'created_at' => '2020-09-24 00:30:45',
                'updated_at' => '2020-09-24 00:30:45',
            ),
            72 =>
            array (
                'id' => 76,
                'country' => 'Haiti',
                'created_at' => '2020-09-24 00:30:52',
                'updated_at' => '2020-09-24 00:30:52',
            ),
            73 =>
            array (
                'id' => 77,
                'country' => 'Holy See',
                'created_at' => '2020-09-24 00:31:00',
                'updated_at' => '2020-09-24 00:31:00',
            ),
            74 =>
            array (
                'id' => 78,
                'country' => 'Honduras',
                'created_at' => '2020-09-24 00:31:09',
                'updated_at' => '2020-09-24 00:31:09',
            ),
            75 =>
            array (
                'id' => 79,
                'country' => 'Hungary',
                'created_at' => '2020-09-24 00:31:14',
                'updated_at' => '2020-09-24 00:31:14',
            ),
            76 =>
            array (
                'id' => 80,
                'country' => 'Iceland',
                'created_at' => '2020-09-24 00:31:20',
                'updated_at' => '2020-09-24 00:31:20',
            ),
            77 =>
            array (
                'id' => 81,
                'country' => 'India',
                'created_at' => '2020-09-24 00:31:27',
                'updated_at' => '2020-09-24 00:31:27',
            ),
            78 =>
            array (
                'id' => 82,
                'country' => 'Indonesia',
                'created_at' => '2020-09-24 00:31:33',
                'updated_at' => '2020-09-24 00:31:33',
            ),
            79 =>
            array (
                'id' => 83,
                'country' => 'Iran',
                'created_at' => '2020-09-24 00:31:39',
                'updated_at' => '2020-09-24 00:31:39',
            ),
            80 =>
            array (
                'id' => 84,
                'country' => 'Iraq',
                'created_at' => '2020-09-24 00:31:45',
                'updated_at' => '2020-09-24 00:31:45',
            ),
            81 =>
            array (
                'id' => 85,
                'country' => 'Ireland',
                'created_at' => '2020-09-24 00:31:51',
                'updated_at' => '2020-09-24 00:31:51',
            ),
            82 =>
            array (
                'id' => 86,
                'country' => 'Israel',
                'created_at' => '2020-09-24 00:31:57',
                'updated_at' => '2020-09-24 00:31:57',
            ),
            83 =>
            array (
                'id' => 87,
                'country' => 'Italy',
                'created_at' => '2020-09-24 00:32:04',
                'updated_at' => '2020-09-24 00:32:04',
            ),
            84 =>
            array (
                'id' => 88,
                'country' => 'Jamaica',
                'created_at' => '2020-09-24 00:32:10',
                'updated_at' => '2020-09-24 00:32:10',
            ),
            85 =>
            array (
                'id' => 89,
                'country' => 'Japan',
                'created_at' => '2020-09-24 00:32:17',
                'updated_at' => '2020-09-24 00:32:17',
            ),
            86 =>
            array (
                'id' => 90,
                'country' => 'Jordan',
                'created_at' => '2020-09-24 00:32:23',
                'updated_at' => '2020-09-24 00:32:23',
            ),
            87 =>
            array (
                'id' => 91,
                'country' => 'Kazakhstan',
                'created_at' => '2020-09-24 00:32:29',
                'updated_at' => '2020-09-24 00:32:29',
            ),
            88 =>
            array (
                'id' => 92,
                'country' => 'Kenya',
                'created_at' => '2020-09-24 00:32:34',
                'updated_at' => '2020-09-24 00:32:34',
            ),
            89 =>
            array (
                'id' => 93,
                'country' => 'Kiribati',
                'created_at' => '2020-09-24 00:32:41',
                'updated_at' => '2020-09-24 00:32:41',
            ),
            90 =>
            array (
                'id' => 94,
                'country' => 'Kuwait',
                'created_at' => '2020-09-24 00:32:48',
                'updated_at' => '2020-09-24 00:32:48',
            ),
            91 =>
            array (
                'id' => 95,
                'country' => 'Kyrgyzstan',
                'created_at' => '2020-09-24 00:32:54',
                'updated_at' => '2020-09-24 00:32:54',
            ),
            92 =>
            array (
                'id' => 96,
                'country' => 'Laos',
                'created_at' => '2020-09-24 00:33:00',
                'updated_at' => '2020-09-24 00:33:00',
            ),
            93 =>
            array (
                'id' => 97,
                'country' => 'Latvia',
                'created_at' => '2020-09-24 00:33:06',
                'updated_at' => '2020-09-24 00:33:06',
            ),
            94 =>
            array (
                'id' => 98,
                'country' => 'Lebanon',
                'created_at' => '2020-09-24 00:33:11',
                'updated_at' => '2020-09-24 00:33:11',
            ),
            95 =>
            array (
                'id' => 99,
                'country' => 'Lesotho',
                'created_at' => '2020-09-24 00:33:19',
                'updated_at' => '2020-09-24 00:33:19',
            ),
            96 =>
            array (
                'id' => 100,
                'country' => 'Liberia',
                'created_at' => '2020-09-24 00:33:55',
                'updated_at' => '2020-09-24 00:33:55',
            ),
            97 =>
            array (
                'id' => 101,
                'country' => 'Libya',
                'created_at' => '2020-09-24 00:34:02',
                'updated_at' => '2020-09-24 00:34:02',
            ),
            98 =>
            array (
                'id' => 102,
                'country' => 'Liechtenstein',
                'created_at' => '2020-09-24 00:34:08',
                'updated_at' => '2020-09-24 00:34:08',
            ),
            99 =>
            array (
                'id' => 103,
                'country' => 'Lithuania',
                'created_at' => '2020-09-24 00:34:15',
                'updated_at' => '2020-09-24 00:34:15',
            ),
            100 =>
            array (
                'id' => 104,
                'country' => 'Luxembourg',
                'created_at' => '2020-09-24 00:34:21',
                'updated_at' => '2020-09-24 00:34:21',
            ),
            101 =>
            array (
                'id' => 105,
                'country' => 'Madagascar',
                'created_at' => '2020-09-24 00:34:28',
                'updated_at' => '2020-09-24 00:34:28',
            ),
            102 =>
            array (
                'id' => 106,
                'country' => 'Malawi',
                'created_at' => '2020-09-24 00:34:35',
                'updated_at' => '2020-09-24 00:34:35',
            ),
            103 =>
            array (
                'id' => 107,
                'country' => 'Malaysia',
                'created_at' => '2020-09-24 00:34:42',
                'updated_at' => '2020-09-24 00:34:42',
            ),
            104 =>
            array (
                'id' => 108,
                'country' => 'Maldives',
                'created_at' => '2020-09-24 00:34:54',
                'updated_at' => '2020-09-24 00:34:54',
            ),
            105 =>
            array (
                'id' => 109,
                'country' => 'Mali',
                'created_at' => '2020-09-24 00:35:01',
                'updated_at' => '2020-09-24 00:35:01',
            ),
            106 =>
            array (
                'id' => 110,
                'country' => 'Malta',
                'created_at' => '2020-09-24 00:35:07',
                'updated_at' => '2020-09-24 00:35:07',
            ),
            107 =>
            array (
                'id' => 111,
                'country' => 'Marshall Islands',
                'created_at' => '2020-09-24 00:35:16',
                'updated_at' => '2020-09-24 00:35:16',
            ),
            108 =>
            array (
                'id' => 112,
                'country' => 'Mauritania',
                'created_at' => '2020-09-24 00:35:29',
                'updated_at' => '2020-09-24 00:35:29',
            ),
            109 =>
            array (
                'id' => 113,
                'country' => 'Mauritius',
                'created_at' => '2020-09-24 00:35:35',
                'updated_at' => '2020-09-24 00:35:35',
            ),
            110 =>
            array (
                'id' => 114,
                'country' => 'Mexico',
                'created_at' => '2020-09-24 00:35:41',
                'updated_at' => '2020-09-24 00:35:41',
            ),
            111 =>
            array (
                'id' => 115,
                'country' => 'Micronesia',
                'created_at' => '2020-09-24 00:35:47',
                'updated_at' => '2020-09-24 00:35:47',
            ),
            112 =>
            array (
                'id' => 116,
                'country' => 'Moldova',
                'created_at' => '2020-09-24 00:35:53',
                'updated_at' => '2020-09-24 00:35:53',
            ),
            113 =>
            array (
                'id' => 117,
                'country' => 'Monaco',
                'created_at' => '2020-09-24 00:36:00',
                'updated_at' => '2020-09-24 00:36:00',
            ),
            114 =>
            array (
                'id' => 118,
                'country' => 'Mongolia',
                'created_at' => '2020-09-24 00:36:17',
                'updated_at' => '2020-09-24 00:36:17',
            ),
            115 =>
            array (
                'id' => 119,
                'country' => 'Montenegro',
                'created_at' => '2020-09-24 00:36:33',
                'updated_at' => '2020-09-24 00:36:33',
            ),
            116 =>
            array (
                'id' => 120,
                'country' => 'Morocco',
                'created_at' => '2020-09-24 00:36:41',
                'updated_at' => '2020-09-24 00:36:41',
            ),
            117 =>
            array (
                'id' => 121,
                'country' => 'Mozambique',
                'created_at' => '2020-09-24 00:36:47',
                'updated_at' => '2020-09-24 00:36:47',
            ),
            118 =>
            array (
                'id' => 122,
            'country' => 'Myanmar (formerly Burma)',
                'created_at' => '2020-09-24 00:36:57',
                'updated_at' => '2020-09-24 00:36:57',
            ),
            119 =>
            array (
                'id' => 123,
                'country' => 'Namibia',
                'created_at' => '2020-09-24 00:37:03',
                'updated_at' => '2020-09-24 00:37:03',
            ),
            120 =>
            array (
                'id' => 124,
                'country' => 'Nauru',
                'created_at' => '2020-09-24 00:37:09',
                'updated_at' => '2020-09-24 00:37:09',
            ),
            121 =>
            array (
                'id' => 125,
                'country' => 'Nepal',
                'created_at' => '2020-09-24 00:37:15',
                'updated_at' => '2020-09-24 00:37:15',
            ),
            122 =>
            array (
                'id' => 126,
                'country' => 'Netherlands',
                'created_at' => '2020-09-24 00:37:21',
                'updated_at' => '2020-09-24 00:37:21',
            ),
            123 =>
            array (
                'id' => 127,
                'country' => 'New Zealand',
                'created_at' => '2020-09-24 00:37:31',
                'updated_at' => '2020-09-24 00:37:31',
            ),
            124 =>
            array (
                'id' => 128,
                'country' => 'Nicaragua',
                'created_at' => '2020-09-24 00:37:43',
                'updated_at' => '2020-09-24 00:37:43',
            ),
            125 =>
            array (
                'id' => 129,
                'country' => 'Niger',
                'created_at' => '2020-09-24 00:37:49',
                'updated_at' => '2020-09-24 00:37:49',
            ),
            126 =>
            array (
                'id' => 130,
                'country' => 'Nigeria',
                'created_at' => '2020-09-24 00:37:56',
                'updated_at' => '2020-09-24 00:37:56',
            ),
            127 =>
            array (
                'id' => 131,
                'country' => 'North Korea',
                'created_at' => '2020-09-24 00:38:04',
                'updated_at' => '2020-09-24 00:38:04',
            ),
            128 =>
            array (
                'id' => 132,
                'country' => 'North Macedonia',
                'created_at' => '2020-09-24 00:38:12',
                'updated_at' => '2020-09-24 00:38:12',
            ),
            129 =>
            array (
                'id' => 133,
                'country' => 'Norway',
                'created_at' => '2020-09-24 00:38:18',
                'updated_at' => '2020-09-24 00:38:18',
            ),
            130 =>
            array (
                'id' => 134,
                'country' => 'Oman',
                'created_at' => '2020-09-24 00:38:24',
                'updated_at' => '2020-09-24 00:38:24',
            ),
            131 =>
            array (
                'id' => 135,
                'country' => 'Pakistan',
                'created_at' => '2020-09-24 00:38:32',
                'updated_at' => '2020-09-24 00:38:32',
            ),
            132 =>
            array (
                'id' => 136,
                'country' => 'Palau',
                'created_at' => '2020-09-24 00:38:38',
                'updated_at' => '2020-09-24 00:38:38',
            ),
            133 =>
            array (
                'id' => 137,
                'country' => 'Palestine State',
                'created_at' => '2020-09-24 00:38:45',
                'updated_at' => '2020-09-24 00:38:45',
            ),
            134 =>
            array (
                'id' => 138,
                'country' => 'Panama',
                'created_at' => '2020-09-24 00:38:54',
                'updated_at' => '2020-09-24 00:38:54',
            ),
            135 =>
            array (
                'id' => 139,
                'country' => 'Papua New Guinea',
                'created_at' => '2020-09-24 00:39:01',
                'updated_at' => '2020-09-24 00:39:01',
            ),
            136 =>
            array (
                'id' => 140,
                'country' => 'Paraguay',
                'created_at' => '2020-09-24 00:39:10',
                'updated_at' => '2020-09-24 00:39:10',
            ),
            137 =>
            array (
                'id' => 141,
                'country' => 'Peru',
                'created_at' => '2020-09-24 00:39:17',
                'updated_at' => '2020-09-24 00:39:17',
            ),
            138 =>
            array (
                'id' => 142,
                'country' => 'Philippines',
                'created_at' => '2020-09-24 00:39:23',
                'updated_at' => '2020-09-24 00:39:23',
            ),
            139 =>
            array (
                'id' => 143,
                'country' => 'Poland',
                'created_at' => '2020-09-24 00:39:30',
                'updated_at' => '2020-09-24 00:39:30',
            ),
            140 =>
            array (
                'id' => 144,
                'country' => 'Portugal',
                'created_at' => '2020-09-24 00:39:36',
                'updated_at' => '2020-09-24 00:39:36',
            ),
            141 =>
            array (
                'id' => 145,
                'country' => 'Qatar',
                'created_at' => '2020-09-24 00:39:44',
                'updated_at' => '2020-09-24 00:39:44',
            ),
            142 =>
            array (
                'id' => 146,
                'country' => 'Romania',
                'created_at' => '2020-09-24 00:39:51',
                'updated_at' => '2020-09-24 00:39:51',
            ),
            143 =>
            array (
                'id' => 147,
                'country' => 'Russia',
                'created_at' => '2020-09-24 00:39:58',
                'updated_at' => '2020-09-24 00:39:58',
            ),
            144 =>
            array (
                'id' => 148,
                'country' => 'Rwanda',
                'created_at' => '2020-09-24 00:40:04',
                'updated_at' => '2020-09-24 00:40:04',
            ),
            145 =>
            array (
                'id' => 149,
                'country' => 'Saint Kitts and Nevis',
                'created_at' => '2020-09-24 00:40:10',
                'updated_at' => '2020-09-24 00:40:10',
            ),
            146 =>
            array (
                'id' => 150,
                'country' => 'Saint Lucia',
                'created_at' => '2020-09-24 00:40:28',
                'updated_at' => '2020-09-24 00:40:28',
            ),
            147 =>
            array (
                'id' => 151,
                'country' => 'Saint Vincent and the Grenadines',
                'created_at' => '2020-09-24 00:40:35',
                'updated_at' => '2020-09-24 00:40:35',
            ),
            148 =>
            array (
                'id' => 152,
                'country' => 'Samoa',
                'created_at' => '2020-09-24 00:40:42',
                'updated_at' => '2020-09-24 00:40:42',
            ),
            149 =>
            array (
                'id' => 153,
                'country' => 'San Marino',
                'created_at' => '2020-09-24 00:40:49',
                'updated_at' => '2020-09-24 00:40:49',
            ),
            150 =>
            array (
                'id' => 154,
                'country' => 'Sao Tome and Principe',
                'created_at' => '2020-09-24 00:40:56',
                'updated_at' => '2020-09-24 00:40:56',
            ),
            151 =>
            array (
                'id' => 155,
                'country' => 'Saudi Arabia',
                'created_at' => '2020-09-24 00:41:03',
                'updated_at' => '2020-09-24 00:41:03',
            ),
            152 =>
            array (
                'id' => 156,
                'country' => 'Senegal',
                'created_at' => '2020-09-24 00:41:09',
                'updated_at' => '2020-09-24 00:41:09',
            ),
            153 =>
            array (
                'id' => 157,
                'country' => 'Serbia',
                'created_at' => '2020-09-24 00:41:15',
                'updated_at' => '2020-09-24 00:41:15',
            ),
            154 =>
            array (
                'id' => 158,
                'country' => 'Seychelles',
                'created_at' => '2020-09-24 00:41:22',
                'updated_at' => '2020-09-24 00:41:22',
            ),
            155 =>
            array (
                'id' => 159,
                'country' => 'Sierra Leone',
                'created_at' => '2020-09-24 00:41:29',
                'updated_at' => '2020-09-24 00:41:29',
            ),
            156 =>
            array (
                'id' => 160,
                'country' => 'Singapore',
                'created_at' => '2020-09-24 00:41:36',
                'updated_at' => '2020-09-24 00:41:36',
            ),
            157 =>
            array (
                'id' => 161,
                'country' => 'Slovakia',
                'created_at' => '2020-09-24 00:41:43',
                'updated_at' => '2020-09-24 00:41:43',
            ),
            158 =>
            array (
                'id' => 162,
                'country' => 'Slovenia',
                'created_at' => '2020-09-24 00:41:49',
                'updated_at' => '2020-09-24 00:41:49',
            ),
            159 =>
            array (
                'id' => 163,
                'country' => 'Solomon Islands',
                'created_at' => '2020-09-24 00:41:55',
                'updated_at' => '2020-09-24 00:41:55',
            ),
            160 =>
            array (
                'id' => 164,
                'country' => 'Somalia',
                'created_at' => '2020-09-24 00:42:02',
                'updated_at' => '2020-09-24 00:42:02',
            ),
            161 =>
            array (
                'id' => 165,
                'country' => 'South Africa',
                'created_at' => '2020-09-24 00:42:09',
                'updated_at' => '2020-09-24 00:42:09',
            ),
            162 =>
            array (
                'id' => 166,
                'country' => 'South Korea',
                'created_at' => '2020-09-24 00:42:23',
                'updated_at' => '2020-09-24 00:42:23',
            ),
            163 =>
            array (
                'id' => 167,
                'country' => 'South Sudan',
                'created_at' => '2020-09-24 00:42:30',
                'updated_at' => '2020-09-24 00:42:30',
            ),
            164 =>
            array (
                'id' => 168,
                'country' => 'Spain',
                'created_at' => '2020-09-24 00:42:42',
                'updated_at' => '2020-09-24 00:42:42',
            ),
            165 =>
            array (
                'id' => 169,
                'country' => 'Sri Lanka',
                'created_at' => '2020-09-24 00:42:49',
                'updated_at' => '2020-09-24 00:42:49',
            ),
            166 =>
            array (
                'id' => 170,
                'country' => 'Sudan',
                'created_at' => '2020-09-24 00:43:14',
                'updated_at' => '2020-09-24 00:43:14',
            ),
            167 =>
            array (
                'id' => 171,
                'country' => 'Suriname',
                'created_at' => '2020-09-24 00:43:28',
                'updated_at' => '2020-09-24 00:43:28',
            ),
            168 =>
            array (
                'id' => 172,
                'country' => 'Sweden',
                'created_at' => '2020-09-24 00:43:34',
                'updated_at' => '2020-09-24 00:43:34',
            ),
            169 =>
            array (
                'id' => 173,
                'country' => 'Switzerland',
                'created_at' => '2020-09-24 00:43:43',
                'updated_at' => '2020-09-24 00:43:43',
            ),
            170 =>
            array (
                'id' => 174,
                'country' => 'Syria',
                'created_at' => '2020-09-24 00:43:49',
                'updated_at' => '2020-09-24 00:43:49',
            ),
            171 =>
            array (
                'id' => 175,
                'country' => 'Tajikistan',
                'created_at' => '2020-09-24 00:43:56',
                'updated_at' => '2020-09-24 00:43:56',
            ),
            172 =>
            array (
                'id' => 176,
                'country' => 'Tanzania',
                'created_at' => '2020-09-24 00:44:03',
                'updated_at' => '2020-09-24 00:44:03',
            ),
            173 =>
            array (
                'id' => 177,
                'country' => 'Thailand',
                'created_at' => '2020-09-24 00:44:10',
                'updated_at' => '2020-09-24 00:44:10',
            ),
            174 =>
            array (
                'id' => 178,
                'country' => 'Timor-Leste',
                'created_at' => '2020-09-24 00:44:16',
                'updated_at' => '2020-09-24 00:44:16',
            ),
            175 =>
            array (
                'id' => 179,
                'country' => 'Togo',
                'created_at' => '2020-09-24 00:44:23',
                'updated_at' => '2020-09-24 00:44:23',
            ),
            176 =>
            array (
                'id' => 180,
                'country' => 'Tonga',
                'created_at' => '2020-09-24 00:44:29',
                'updated_at' => '2020-09-24 00:44:29',
            ),
            177 =>
            array (
                'id' => 181,
                'country' => 'Trinidad and Tobago',
                'created_at' => '2020-09-24 00:44:36',
                'updated_at' => '2020-09-24 00:44:36',
            ),
            178 =>
            array (
                'id' => 182,
                'country' => 'Tunisia',
                'created_at' => '2020-09-24 00:44:42',
                'updated_at' => '2020-09-24 00:44:42',
            ),
            179 =>
            array (
                'id' => 183,
                'country' => 'Turkey',
                'created_at' => '2020-09-24 00:44:49',
                'updated_at' => '2020-09-24 00:44:49',
            ),
            180 =>
            array (
                'id' => 184,
                'country' => 'Turkmenistan',
                'created_at' => '2020-09-24 00:44:55',
                'updated_at' => '2020-09-24 00:44:55',
            ),
            181 =>
            array (
                'id' => 185,
                'country' => 'Tuvalu',
                'created_at' => '2020-09-24 00:45:01',
                'updated_at' => '2020-09-24 00:45:01',
            ),
            182 =>
            array (
                'id' => 186,
                'country' => 'Uganda',
                'created_at' => '2020-09-24 00:45:07',
                'updated_at' => '2020-09-24 00:45:07',
            ),
            183 =>
            array (
                'id' => 187,
                'country' => 'Ukraine',
                'created_at' => '2020-09-24 00:45:13',
                'updated_at' => '2020-09-24 00:45:13',
            ),
            184 =>
            array (
                'id' => 188,
                'country' => 'United Arab Emirates',
                'created_at' => '2020-09-24 00:45:20',
                'updated_at' => '2020-09-24 00:45:20',
            ),
            185 =>
            array (
                'id' => 189,
                'country' => 'United Kingdom',
                'created_at' => '2020-09-24 00:45:31',
                'updated_at' => '2020-09-24 00:45:31',
            ),
            186 =>
            array (
                'id' => 190,
                'country' => 'United States of America',
                'created_at' => '2020-09-24 00:45:40',
                'updated_at' => '2020-09-24 00:45:40',
            ),
            187 =>
            array (
                'id' => 191,
                'country' => 'Uruguay',
                'created_at' => '2020-09-24 00:45:46',
                'updated_at' => '2020-09-24 00:45:46',
            ),
            188 =>
            array (
                'id' => 192,
                'country' => 'Uzbekistan',
                'created_at' => '2020-09-24 00:45:52',
                'updated_at' => '2020-09-24 00:45:52',
            ),
            189 =>
            array (
                'id' => 193,
                'country' => 'Vanuatu',
                'created_at' => '2020-09-24 00:45:59',
                'updated_at' => '2020-09-24 00:45:59',
            ),
            190 =>
            array (
                'id' => 194,
                'country' => 'Venezuela',
                'created_at' => '2020-09-24 00:46:06',
                'updated_at' => '2020-09-24 00:46:06',
            ),
            191 =>
            array (
                'id' => 195,
                'country' => 'Vietnam',
                'created_at' => '2020-09-24 00:46:13',
                'updated_at' => '2020-09-24 00:46:13',
            ),
            192 =>
            array (
                'id' => 196,
                'country' => 'Yemen',
                'created_at' => '2020-09-24 00:46:19',
                'updated_at' => '2020-09-24 00:46:19',
            ),
            193 =>
            array (
                'id' => 197,
                'country' => 'Zambia',
                'created_at' => '2020-09-24 00:46:25',
                'updated_at' => '2020-09-24 00:46:25',
            ),
            194 =>
            array (
                'id' => 198,
                'country' => 'Zimbabwe',
                'created_at' => '2020-09-24 00:46:32',
                'updated_at' => '2020-09-24 00:46:32',
            ),
            195 =>
            array (
                'id' => 199,
                'country' => 'Africa',
                'created_at' => '2021-03-08 11:41:49',
                'updated_at' => '2021-03-08 11:41:49',
            ),
        ));


    }
}
