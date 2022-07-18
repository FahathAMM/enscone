<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('projects')->truncate();
        DB::table('skills')->truncate();
        DB::table('projects')->truncate();
        DB::table('experiences')->truncate();
        DB::table('contacts')->truncate();
        DB::table('abouts')->truncate();
        DB::table('educations')->truncate();
        DB::table('services')->truncate();


        $projects = [
            [
                'user_id'     => 1,
                'name'        => 'Dmate',
                'type'        => '1',
                'description' => 'Complete Hospital Management And Treatment Are All, Pharmacy, POS,
                Appointment With Mobile App Ex:- Dental, Dermatology And More Than Ten
                Treatments (Web App )',
            ],
            [
                'user_id'     => 1,
                'name'        => 'Dream House',
                'type'        => '1',
                'description' => 'This Web App Would Be Very Useful To The Ones Who Intend To Buy, Sell
                and Rent Houses Island Wide',
            ],
            [
                'user_id'     => 1,
                'name'        => 'Mediation Board',
                'type'        => '1',
                'description' => 'This System Developing For Mediation Board System Base Managing Files',
            ],
            [
                'user_id'     => 1,
                'name'        => 'Pinecone (Point of Sale)',
                'type'        => '1',
                'description' => 'Will help transform his stores into digital stores',
            ],
        ];

        foreach ($projects as $project) {
            DB::table('projects')->insert($project);
        }

        $skills = [
            [
                'user_id'     => 1,
                'name'        => 'C#',
                'category'    => 'Desktop Application',
                'description' => 'best',
                'level'       => '80',
            ],
            [
                'user_id'     => 1,
                'name'        => 'C++',
                'category'    => 'Desktop Application',
                'description' => 'best',
                'level'       => '50',
            ],
            [
                'user_id'     => 1,
                'name'        => 'VB',
                'category'    => 'Desktop Application',
                'description' => 'best',
                'level'       => '80',
            ],
            [
                'user_id'     => 1,
                'name'        => '.NET',
                'category'    => 'Desktop Application',
                'description' => 'best',
                'level'       => '80',
            ],
            [
                'user_id'     => 1,
                'name'        => 'WPF',
                'category'    => 'Desktop Application',
                'description' => 'best',
                'level'       => '80',
            ],

            [
                'user_id'     => 1,
                'name'        => 'Laravel',
                'category'    => 'Web Application',
                'description' => 'best',
                'level'       => '99',
            ],
            [
                'user_id'     => 1,
                'name'        => 'Livewire',
                'category'    => 'Web Application',
                'description' => 'best',
                'level'       => '99',
            ],
            [
                'user_id'     => 1,
                'name'        => 'Codeigniter',
                'category'    => 'Web Application',
                'description' => 'best',
                'level'       => '80',
            ],
            [
                'user_id'     => 1,
                'name'        => 'PHP',
                'category'    => 'Web Application',
                'description' => 'best',
                'level'       => '99',
            ],
            [
                'user_id'     => 1,
                'name'        => 'JQuery',
                'category'    => 'Web Application',
                'description' => 'best',
                'level'       => '99',
            ],
            [
                'user_id'     => 1,
                'name'        => 'HTML5',
                'category'    => 'Web Application',
                'description' => 'best',
                'level'       => '99',
            ],
            [
                'user_id'     => 1,
                'name'        => 'JavaScript',
                'category'    => 'Web Application',
                'description' => 'best',
                'level'       => '99',
            ],
            [
                'user_id'     => 1,
                'name'        => 'Bootstrap',
                'category'    => 'Web Application',
                'description' => 'best',
                'level'       => '99',
            ],
            [
                'user_id'     => 1,
                'name'        => 'Vue Js',
                'category'    => 'Web Application',
                'description' => 'best',
                'level'       => '80',
            ],
            [
                'user_id'     => 1,
                'name'        => 'NodeJS (Reading)',
                'category'    => 'Web Application',
                'description' => 'best',
                'level'       => '50',
            ],
            [
                'user_id'     => 1,
                'name'        => 'MS SQL Server',
                'category'    => 'Database System',
                'description' => 'best',
                'level'       => '99',
            ],
            [
                'user_id'     => 1,
                'name'        => 'MySQL',
                'category'    => 'Database System',
                'description' => 'best',
                'level'       => '99',
            ],
            [
                'user_id'     => 1,
                'name'        => 'MS Access',
                'category'    => 'Database System',
                'description' => 'best',
                'level'       => '50',
            ],
            [
                'user_id'     => 1,
                'name'        => 'MongoDB (Reading)',
                'category'    => 'Database System',
                'description' => 'best',
                'level'       => '30',
            ],
            [
                'user_id'     => 1,
                'name'        => 'Fire Base',
                'category'    => 'Database System',
                'description' => 'best',
                'level'       => '50',
            ],
            [
                'user_id'     => 1,
                'name'        => 'OOP',
                'category'    => 'Another Skills',
                'description' => 'best',
                'level'       => '99',
            ],
            [
                'user_id'     => 1,
                'name'        => 'API',
                'category'    => 'Another Skills',
                'description' => 'best',
                'level'       => '99',
            ],
            [
                'user_id'     => 1,
                'name'        => 'GitHub',
                'category'    => 'Another Skills',
                'description' => 'best',
                'level'       => '99',
            ],
            [
                'user_id'     => 1,
                'name'        => 'Bitbucket',
                'category'    => 'Another Skills',
                'description' => 'best',
                'level'       => '99',
            ],
            [
                'user_id'     => 1,
                'name'        => 'Jira',
                'category'    => 'Another Skills',
                'description' => 'best',
                'level'       => '80',
            ],
            [
                'user_id'     => 1,
                'name'        => 'Trello Board',
                'category'    => 'Another Skills',
                'description' => 'best',
                'level'       => '80',
            ],
            [
                'user_id'     => 1,
                'name'        => 'Postman',
                'category'    => 'Another Skills',
                'description' => 'best',
                'level'       => '99',
            ],
            [
                'user_id'     => 1,
                'name'        => 'Ubuntu',
                'category'    => 'Experience in Open-Source',
                'description' => 'best',
                'level'       => '90',
            ],

        ];

        foreach ($skills as $skill) {
            DB::table('skills')->insert($skill);
        }

        $services = [
            [
                'user_id'     => 1,
                'name'        => 'Web Application',
                'description' => 'This Web App Would Be Very Useful To The Ones Who Intend To Buy, Sell  and Rent Houses Island Wide',
            ],
            [
                'user_id'     => 1,
                'name'        => 'Desktop Application',
                'description' => 'This Web App Would Be Very Useful To The Ones Who Intend To Buy, Sell  and Rent Houses Island Wide',
            ],
            [
                'user_id'     => 1,
                'name'        => 'E-Commerce Sites',
                'description' => 'This System Developing For Mediation Board System Base Managing Files',
            ],
            [
                'user_id'     => 1,
                'name'        => 'Point of Sale',
                'description' => 'Will help transform his stores into digital stores',
            ],
            [
                'user_id'     => 1,
                'name'        => 'Billing Systems',
                'description' => 'Will help transform his stores into digital stores',
            ],
        ];

        foreach ($services as $service) {
            DB::table('services')->insert($service);
        }

        $experiences = [
            [
                'user_id'     => 1,
                'name'        => 'ideaGeek',
                'position'    => 'Junior Software Developer',
                'start'       => '2020-08-09',
                'end'         => '2021-02-01',
                'description' => 'I worked as a Full Stack Software Developer here for my Internship Training after completing my Higher Education.',
            ],
            [
                'user_id'     => 1,
                'name'        => 'NSoft',
                'position'    => 'Junior Full Stack Developer',
                'start'       => '2021-2-05',
                'end'         => '2021-5-01',
                'description' => 'I worked here as a web App Full Stack Developer.',
            ],
            [
                'user_id'     => 1,
                'name'        => 'Elegant Media',
                'position'    => 'Associate Software Engineer',
                'start'       => '2021-5-05',
                'end'         => 'Present',
                'description' => 'I have have been working here as a web App Backend Developer',
            ],

        ];

        foreach ($experiences as $experience) {
            DB::table('experiences')->insert($experience);
        }

        $contacts = [
            [
                'user_id' => 1,
                'name'    => 'linkedin',
                'value'   => 'https://www.linkedin.com/in/fahath-mohamed-3ab47416b/',
            ],
            [
                'user_id' => 1,
                'name'    => 'github',
                'value'   => 'https://github.com/FahathAMM/',
            ],
            [
                'user_id' => 1,
                'name'    => 'facebook',
                'value'   => 'Fahad Amm',
            ],
            [
                'user_id' => 1,
                'name'    => 'mail',
                'value'   => 'fahathammex90@gmail.com',
            ],

        ];

        foreach ($contacts as $contact) {
            DB::table('contacts')->insert($contact);
        }

        $abouts = [
            [
                'user_id' => 1,
                'keys'    => 'date of birth',
                'value'   => '29/06/1998',
            ],
            [
                'user_id' => 1,
                'keys'    => 'LANGUAGE',
                'value'   => 'Tamil,English,Sinhala',
            ],
            [
                'user_id' => 1,
                'keys'    => 'FREELANCE',
                'value'   => 'Available',
            ],
            [
                'user_id' => 1,
                'keys'    => 'Mail',
                'value'   => 'fahathammex90@gmail.com',
            ],

        ];

        foreach ($abouts as $about) {
            DB::table('abouts')->insert($about);
        }

        $educations = [
            [
                'user_id'     => 1,
                'name'        => 'Advance Level',
                'institute'   => 'KM/KM ZAHIRA COLLEGE',
                'start'       => '2015-2-05',
                'end'         => '2017-2-05',
                'description' => 'Successfully Completed GCE A/L (ARTS)',
            ],
            [
                'user_id'     => 1,
                'name'        => 'Higher Education',
                'institute'   => 'SRI LANKA INSTITUTE OF ADVANCE TECHNOLOGICAL EDUCATION',
                'start'       => '2018-1-01',
                'end'         => '2020-1-01',
                'description' => 'Successfully Completed Higher National Diploma In Information Technology (HNDIT) 2 Years At SLIATE (SRI LANKA INSTITUTE OF ADVANCE TECHNOLOGICAL EDUCATION)',
            ],
            [
                'user_id'     => 1,
                'name'        => 'Bachelor of Information Technology (Hons)',
                'institute'   => 'LINCOLN UNIVERSITY COLLEGE MALAYSIA',
                'start'       => '2021-8-05',
                'end'         => '2022-08-05',
                'description' => 'Following Undergraduate Degree',
            ],

        ];

        foreach ($educations as $education) {
            DB::table('educations')->insert($education);
        }
    }
}
