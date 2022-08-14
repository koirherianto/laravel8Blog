<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => mt_rand(1,5),
            'category_id' => mt_rand(1,5),
            'title' => $title = $this->faker->sentence(mt_rand(3,8)),
            'slug'  => $this->textToSlug($title),
            'excerpt' => $this->faker->paragraph(),
            // 'body'  => $this->faker->paragraphs(rand(5,10))
            'body'  => collect($this->faker->paragraphs(mt_rand(5,10)))->map(fn($p) => "<p>$p</p>")->implode('')
        ];
    }

    public function textToSlug($text='') {
        $text = trim($text);
        if (empty($text)) return '';
          $text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
          $text = strtolower(trim($text));
          $text = str_replace(' ', '-', $text);
          $text = $text_ori = preg_replace('/\-{2,}/', '-', $text);
          return $text;
    }
    
}
