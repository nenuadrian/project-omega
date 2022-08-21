<?php declare(strict_types=1);

class Admin {
    
    public static function generateUsers(int $n): array {
        $faker = Faker\Factory::create();
        $users = [];
        for ($i = 1; $i <= $n; $i++) {
            $email = $faker->email();
            $username = strtolower(str_replace(' ', '', $faker->name()));
            User::doRegister($username, $email, $username);
            $users[] = $username;
        }
        return $users;
    }

    public static function generateServers(): array {
        $users = DB::query('SELECT user_id FROM stats ORDER BY RAND() LIMIT 50;');
        foreach ($users as $user) {
            Server::insert([
                'location_id' => 1,
                'user_id'     => $user['user_id']
            ]);
        }
        return $users;
    }
}