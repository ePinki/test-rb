<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Books extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $books = array();
      $catalogs = array();
      $books_catalog = array();
      for ($i=1; $i < 21; $i++) {
        $books[] = ['title' => 'Книга '.$i];
        $books_catalog[] = ['book_id' => $i, 'catalog_id' => rand(1,10)];
      }
      for ($i=1; $i < 11; $i++) {
        $catalogs[] = ['title' => 'catalog '.$i];
      }
      DB::table('Books')->insert($books);
      DB::table('catalogs')->insert($catalogs);
      DB::table('books__catalogs')->insert($books_catalog);

    }
}
