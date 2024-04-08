<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\AlcoholModel;



class AlcoholSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            AlcoholModel::create([
                'name' => $this->generateRandomName(),
                'brend' => $this->generateRandombrend(),
                'volume' => $this->generateRandomVolume(),
                'provider' => $this->generateRandomProvidor(),
                'delivery_time' => $this->generateRandomDeliveryTime(),
            ]);


        }

    }

    private function generateRandomName()
    {
        $alcoholName = ['Віскі', 'Ром', 'Джин', 'Водка', 'Текіла', 'Коньяк', 'Бренді', 'Шампанське', 'Вино', 'Пиво', 'Сидр', 'Мезкаль', 'Лікер', 'Абсент', 'Самбука', 'Портвейн', 'Бурбон', 'Саке', 'Шеррі', 'Тікіла'];
        return $alcoholName[array_rand($alcoholName)];

    }

    private function generateRandombrend()
    {
        $alcoholBrand = ["Jack Daniel's", "Hennessy", "Johnnie Walker", "Bacardi", "Smirnoff", "Absolut", "Grey Goose", "Jim Beam", "Chivas Regal", "Jameson", "Patron", "Bombay Sapphire", "Jose Cuervo", "Maker's Mark", "Glenfiddich", "Courvoisier", "Tito's Handmade Vodka", "Belvedere", "Dom Perignon", "Moet & Chandon"];
        return $alcoholBrand[array_rand($alcoholBrand)];

    }

    private function generateRandomVolume()
    {
        $alcoholvolyme = ['0.2', '0.5', '0.7', '1', '1.5', '1.7', '2'];
        return $alcoholvolyme[array_rand($alcoholvolyme)];

    }

    private function generateRandomProvidor()
    {
        $firstname = ["Іван", "Петро", "Марія", "Олександр", "Ольга", "Андрій", "Тетяна", "Віктор", "Наталія", "Сергій", "Юлія", "Михайло", "Анна", "Дмитро", "Валентина", "Володимир", "Оксана", "Станіслав", "Ірина", "Роман"];
        $lastname = ["Петров", "Іванов", "Сидорова", "Коваленко", "Павленко", "Ковальчук", "Мельник", "Шевченко", "Григоренко", "Семенов", "Козлова", "Бондар", "Сергієнко", "Коваль", "Лисенко", "Харитоненко", "Кравченко", "Гончаренко", "Макаренко", "Денисенко"];

        $randomfirstname = $firstname[array_rand($firstname)];
        $randomlastname = $lastname[array_rand($lastname)];

        return $randomfirstname . ' ' . $randomlastname;
    }

    private function generateRandomDeliveryTime()
    {
        return Carbon::now()->subDays(rand(1, 365));
    }
}
