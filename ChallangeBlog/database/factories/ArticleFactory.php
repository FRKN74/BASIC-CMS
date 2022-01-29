<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Article;
//str slug için
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     * 
     *
     * @return array
     */

        protected $model = Article::class;
        
    public function definition()
    {
        $title = $this->faker->username();
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'name' =>$this->faker->name(),
            'image' =>$this->faker->imageUrl($width= 250,),
            'description' =>$this->faker->text($maxNbChars = 2000),
        ];
    }
}
