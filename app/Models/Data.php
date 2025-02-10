<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $guarded = [
        // Kolom yang tidak boleh diisi massal
    ];


    public function up()
{
    Schema::create('data', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('content')->nullable();
        $table->timestamps();
    });
}

}
