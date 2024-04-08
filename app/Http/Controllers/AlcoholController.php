<?php

namespace App\Http\Controllers;

use App\Models\AlcoholModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AlcoholController extends Controller
{
    public function createalcoholpost()
    {
        $data = request()->validate([
            'name' => '',
            'brend' => '',
            'volume' => '',
            'provider' => '',
            'delivery_time' => '',
        ]);
        AlcoholModel::create($data);

    }
    public function index()
    {
        $alco = 'string';
        var_dump($alco);
    }
    public function fillTablerandom($count)
    {
        for($i = 0; $i< $count; $i++){
            $name = $this->generateRandomName();
            $brend = $this->generateRandombrend();
            $volume = $this->generateRandomVolume();
            $provider = $this->generateRandomProvidor();
            $delivery_time = $this->generateRandomDeliveryTime();

            AlcoholModel::create([
                'name' => $name,
                'brend' => $brend,
                'volume' => $volume,
                'provider' => $provider,
                'delivery_time' =>$delivery_time
            ]);
        }
        return response()->json(['message' => 'Table filled with random data.']);

    }

    private function generateRandomName()
    {
        $alcoholName = ['Віскі', 'Ром', 'Джин', 'Водка', 'Текіла', 'Коньяк', 'Бренді', 'Шампанське', 'Вино', 'Пиво', 'Сидр', 'Мезкаль', 'Лікер', 'Абсент', 'Самбука', 'Портвейн', 'Бурбон', 'Саке', 'Шеррі', 'Тікіла'];
        $randomalcoholName = $alcoholName[array_rand($alcoholName)];
        return $randomalcoholName;
    }

    private function generateRandombrend()
    {
        $alcoholBrand = [
            "Jack Daniel's",
            "Hennessy",
            "Johnnie Walker",
            "Bacardi",
            "Smirnoff",
            "Absolut",
            "Grey Goose",
            "Jim Beam",
            "Chivas Regal",
            "Jameson",
            "Patron",
            "Bombay Sapphire",
            "Jose Cuervo",
            "Maker's Mark",
            "Glenfiddich",
            "Courvoisier",
            "Tito's Handmade Vodka",
            "Belvedere",
            "Dom Perignon",
            "Moet & Chandon"
        ];
        $randomalcoholBrand = $alcoholBrand[array_rand($alcoholBrand)];

        return $randomalcoholBrand;

    }

    private function generateRandomVolume()
    {
        $alcoholvolyme = ['0.2', '0.5', '0.7', '1', '1.5', '1.7', '2'];
        $randomalcogolvolyme = $alcoholvolyme[array_rand($alcoholvolyme)];
        return $randomalcogolvolyme;
    }

    private function generateRandomProvidor()
    {
        $firstname = ["Іван", "Петро", "Марія", "Олександр", "Ольга","Андрій", "Тетяна", "Віктор", "Наталія", "Сергій", "Юлія", "Михайло", "Анна", "Дмитро", "Валентина", "Володимир", "Оксана", "Станіслав", "Ірина", "Роман"];
        $lastname = ["Петров", "Іванов", "Сидорова", "Коваленко", "Павленко", "Ковальчук", "Мельник", "Шевченко", "Григоренко", "Семенов", "Козлова", "Бондар", "Сергієнко", "Коваль", "Лисенко", "Харитоненко", "Кравченко", "Гончаренко", "Макаренко", "Денисенко"];

        $randomfirstname = $firstname[array_rand($firstname)];
        $randomlastname= $lastname[array_rand($lastname)];

        return $randomfirstname. ' '. $randomlastname;
    }

    private function generateRandomDeliveryTime()
    {
        $randomdeliverytime = Carbon::now()->subDays(rand(1,365));
        return $randomdeliverytime;

    }

    public function record()
    {
        $record = AlcoholModel::find(1);
        if($record){
            dd($record);
        }else{
            echo "ni hy ya";
        }
    }

    public function alt()
    {
        $posts = AlcoholModel::where('volume', '0.5')->get();
        foreach ($posts as $post){
            dump($post->name);
        }
        dd('end');
    }

    public function createalcohol()
    {
        $postsArr = [
            'name' => 'Текила',
            'brend' => 'Bacardi',
            'volume' => '0.5',
            'provider' => 'Михайло Іванов',
            'delivery_time' => '2023-12-05 09:20:36'
        ];
        AlcoholModel::create($postsArr);
        dd('created');
    }

    public function addrandomalco($count)
    {
        for($i=1; $i<=$count; $i++){
            AlcoholModel::create([
                'name' => $this->generateRandomName(),
                'brend' => $this->generateRandombrend(),
                'volume' => $this->generateRandomVolume(),
                'provider' => $this->generateRandomProvidor(),
                'delivery_time' => $this->generateRandomDeliveryTime()
            ]);
        }
        dd('Create'.' '. $count.' '. 'model');

    }

    public function update($count)
    {
        $post = AlcoholModel::find($count);

        $post->update([
            'name' => $this->generateRandomName(),
            'brend' => $this->generateRandombrend(),
            'volume' => $this->generateRandomVolume(),
            'provider' => $this->generateRandomProvidor(),
            'delivery_time' => $this->generateRandomDeliveryTime()
        ]);
    }

    public function deleteid($id)
    {
        $delalco = AlcoholModel::find($id);
        if(!$delalco){
            return response()->json(['error' => 'Alcohol not found'], 404);
        }
        $delalco->delete();

        return response()->json(['message' => 'Alcohol deleted successfully'], 200);

    }

    public function deleteidcount($count)
    {

        $idArray = AlcoholModel::pluck('id')->toArray();
        if (count($idArray) < $count) {
            dd('В таблиці не має стільки елементів .');
        }
        if ($count==0){
            dd('Ви нікого не захотіли видааляти');
        }


        for($i=0; $i<$count; $i++){
            $idArrayRandKey = array_rand($idArray);
            $id = $idArray[$idArrayRandKey];
            $winer = AlcoholModel::find($id);
            $winer->delete();
            unset($idArray[$idArrayRandKey]);
        }
        dd('gotowo');
    }

    public function firstorcreate()
    {
        $post = AlcoholModel::firstOrCreate([
            'name'=> 'Джин'
        ],[
            'name' => $this->generateRandomName(),
            'brend' => $this->generateRandombrend(),
            'volume' => $this->generateRandomVolume(),
            'provider' => $this->generateRandomProvidor(),
            'delivery_time' => $this->generateRandomDeliveryTime(),
        ]);
        dump($post->id);
        dd('finish');
    }
    public function updateorcreate()
    {
        $post = AlcoholModel::updateOrCreate([
            'name' => 'Джиfн'
        ], [
            'name' => $this->generateRandomName(),
            'brend' => $this->generateRandombrend(),
            'volume' => $this->generateRandomVolume(),
            'provider' => $this->generateRandomProvidor(),
            'delivery_time' => $this->generateRandomDeliveryTime(),
        ]);
        dump($post->id);
        dd('finish');
    }
    public function sorts($name)
    {
        $nameAsString = strtolower($name);
        $posts = AlcoholModel::where('volume', $nameAsString)->get();
        foreach ($posts as $post){
            dump($post->name);
        }

        dd('end');
    }
//
    public function filter(Request $request)
    {
        $filters = $request->query();
        $alcohols = AlcoholModel::query();
        foreach ($filters as $field => $value) {
            if ($field !== 'sort_field' && $field !== 'sort_direction' && $value) {
                $alcohols->where($field, 'like', '%' . $value . '%');
            }
        }
        $sortField = $request->query('sort_field');
        $sortDirection = $request->query('sort_direction', 'asc');
        if ($sortField) {
            $alcohols->orderBy($sortField, $sortDirection);
        }
        $filteredAlcohols = $alcohols->get();
        dd($filteredAlcohols);
    }
}

