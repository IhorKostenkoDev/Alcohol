<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alcohols', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('brend');
            $table->string('volume');
            $table->string('provider');
            $table->string('delivery_time');

            $table->softDeletes();
        });
    }
    public function filter(Request $request)
    {
        $filters = $request->only(['name', 'brend', 'volume']);

        $alcohols = AlcoholModel::query();

        foreach ($filters as $field => $value) {
            if ($value) {
                $alcohols->where($field, 'like', '%' . $value . '%');
            }
        }

        $filteredAlcohols = $alcohols->get();

        return response()->json($filteredAlcohols);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alcohols');
    }
};
