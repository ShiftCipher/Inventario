<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->call(CategoriesTableSeeder::class);
      $this->call(RolesTableSeeder::class);
      $this->call(StatesTableSeeder::class);
      $this->call(RegionsTableSeeder::class);
      $this->call(CitiesTableSeeder::class);
      $this->call(StoresTableSeeder::class);

      $this->call(CartsTableSeeder::class);
      $this->call(UsersTableSeeder::class);
      # $this->call(IssuesTableSeeder::class);
      # $this->call(CommentsTableSeeder::class);

      $this->call(ProductsTableSeeder::class);
      $this->call(RepairsTableSeeder::class);
      $this->call(EventsTableSeeder::class);
      $this->call(OrdersTableSeeder::class);
      $this->call(ReportsTableSeeder::class);
      $this->call(RangesTableSeeder::class);
    }
}
