<?php

namespace Database\Seeders;

use App\Models\Part;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@sto.local'],
            ['name' => 'Адміністратор СТО', 'password' => Hash::make('ChangeMe123!')],
        );

        foreach ([
            ['title' => 'Комп’ютерна діагностика', 'description' => 'Зчитування кодів помилок і первинна перевірка електронних систем.', 'price' => 600],
            ['title' => 'Заміна мастила', 'description' => 'Заміна моторного мастила та масляного фільтра.', 'price' => 850],
            ['title' => 'Ремонт гальмівної системи', 'description' => 'Діагностика, заміна колодок і дисків за потреби.', 'price' => 1200],
            ['title' => 'Обслуговування підвіски', 'description' => 'Перевірка вузлів підвіски та усунення несправностей.', 'price' => 1000],
        ] as $service) {
            Service::query()->updateOrCreate(['title' => $service['title']], $service);
        }

        foreach ([
            ['oem_number' => '90915-YZZM3', 'name' => 'Масляний фільтр', 'supplier' => 'Toyota', 'price' => 280],
            ['oem_number' => '04465-0D140', 'name' => 'Комплект гальмівних колодок', 'supplier' => 'Toyota', 'price' => 2100],
            ['oem_number' => '06J-103-403-Q', 'name' => 'Прокладка клапанної кришки', 'supplier' => 'VAG', 'price' => 690],
            ['oem_number' => 'A-000-817-18-16', 'name' => 'Повітряний фільтр', 'supplier' => 'Mercedes-Benz', 'price' => 1150],
        ] as $part) {
            Part::query()->updateOrCreate(['oem_number' => $part['oem_number']], $part);
        }
    }
}
