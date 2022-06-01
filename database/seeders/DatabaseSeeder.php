<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\MyClass;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Payment;
use App\Helpers\MarkHelper;
use App\Constants\Constants;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    protected $classes = [
        0 => 'Técnico en Contabilidad',
        1 => 'Técnico en Ofimática',
        2 => 'Técnico en Programación',
        3 => 'Técnico en Mantenimiento Industrial',
    ];

    protected $sections = [
        0 => '1°A',
        1 => '1°G',
    ];

    protected $subjects = [
        0 => 'ÁLGEBRA',
        1 => 'LÓGICA',
        2 => 'TECNOLOGÍAS DE LA INFORMACIÓN Y LA COMUNICACIÓN',
        3 => 'QUÍMICA I',
        4 => 'INGLÉS I',
        5 => 'LECTURA, EXPRESIÓN ORAL Y ESCRITA I'
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'ADMINISTRADOR',
            'email' => 'mikechacon89@gmail.com',
            'role' => Constants::ROLE['ADMINISTRADOR'],
            'password' => Hash::make('cetis87delicias')
        ]);

        Payment::create([
            'title' => 'INSCRIPCIÓN',
            'amount' => '1400',
            'status' => true
        ]);

        User::create([
            'name' => 'DOCENTE UNO',
            'email' => 'teacher@gmail.com',
            'role' => Constants::ROLE['DOCENTE'],
            'password' => Hash::make('1234'),
            'birthday' => '1989-01-01',
            'gender' => Constants::GENDER[1],
            'address' => 'Dirección prueba',
            'phone' => '6391234567',
            'blood_group' => Constants::BLOOD_GROUP[0]
        ]);

        User::create([
            'name' => 'FINANCIERO UNO',
            'email' => 'financiero@gmail.com',
            'role' => Constants::ROLE['FINANCIERO'],
            'password' => Hash::make('1234'),
            'birthday' => '1989-01-01',
            'gender' => Constants::GENDER[1],
            'address' => 'Dirección prueba',
            'phone' => '6391234567',
            'blood_group' => Constants::BLOOD_GROUP[0]
        ]);

        User::create([
            'name' => 'ORIENTACION UNO',
            'email' => 'orientacion@gmail.com',
            'role' => Constants::ROLE['ORIENTACION'],
            'password' => Hash::make('1234'),
            'birthday' => '1989-01-01',
            'gender' => Constants::GENDER[1],
            'address' => 'Dirección prueba',
            'phone' => '6391234567',
            'blood_group' => Constants::BLOOD_GROUP[0]
        ]);

        //foreach of this classes
        foreach ($this->classes as $class) {
            MyClass::create([
                'name' => mb_strtoupper($class, 'UTF-8'),
                'status' => true
            ]);
        }

        $j = 0;

        foreach ($this->sections as $section) {
            Section::create([
                'name' => mb_strtoupper($section, 'UTF-8'),
                'my_class_id' => 3,
                'status' => true,
                'semester' => '1',
                'time' => $j == 0
                    ? Constants::TIME[0]
                    : Constants::TIME[1]
            ]);

            $j++;
        }

        foreach ($this->subjects as $subject) {
            for ($i = 0; $i < 2; $i++) {
                Subject::create([
                    'name' => $subject,
                    'slug' => '',
                    'my_class_id' => 3,
                    'section_id' => $i + 1,
                    'teacher_id' => 2,
                    'time' => $i == 0
                        ? Constants::TIME[0]
                        : Constants::TIME[1],
                    'status' => true,
                    'semester' => '1'
                ]);
            }
        }

        for ($i = 0; $i < 2; $i++) {
            $text = $i == 0 ? 'uno' : 'dos';
            $user = User::create([
                'name' => strtoupper("ALUMNO $text"),
                'email' => "alumno$text@gmail.com",
                'control_number' => "2054023$i",
                'role' => Constants::ROLE['ESTUDIANTE'],
                'password' => Hash::make('1234'),
                'birthday' => '1999-01-01',
                'gender' => Constants::GENDER[1],
                'address' => 'Dirección prueba',
                'phone' => '6391234567',
                'blood_group' => Constants::BLOOD_GROUP[0]
            ]);

            MarkHelper::createStudentRecord(
                $user->id,
                3,
                1,
                'ENERO-JUNIO'
            );

            MarkHelper::createMarks(
                $user->id,
                3,
                1,
                'ENERO-JUNIO'
            );
        }
    }
}
