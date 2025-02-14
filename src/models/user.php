<?php declare(strict_types=1);
use Ramsey\Uuid\Uuid;

class User extends Model {
    protected static string $table = 'users';
    protected static string $identityColumn = 'user_id';

    static function byEmail(string $email): ?array {
        return DB::queryFirstRow("SELECT * FROM users where email = %s", $email);
    }

    static function byIdentifier(string $id): ?array {
        return DB::queryFirstRow("SELECT * FROM users where email = %s OR username=%s ", $id, $id);
    }

    static function login(string $id, string $password): string {
        $user = static::byIdentifier($id);
        if (!$user || !password_verify($password, $user['password'])) {
            throw new Exception('Incorrect credentials!');
        } else {
            $uuid = Uuid::uuid4();
            $session_hash = $uuid->toString();

            Session::insert([
                'session_hash' => $session_hash,
                'user_id' => $user['user_id']
            ]);
            return $session_hash;
        }
    }

    static function doRegister(string $username, string $email, string $password): int {
        $userId = User::insert([
            'email'    => $email,
            'username' => $username,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ]);
        Settings::insert(['user_id' => $userId]);
        Stats::insert(['user_id' => $userId, 'username' => $username]);
        return $userId;
    }

    static function register(string $username, string $email, string $password): int {
        if (User::byEmail($email)) {
            throw new Exception('E-mail is already in use!');
        } else if (User::byIdentifier($username)) {
            throw new Exception('Username is already in use!');
        } else {
            return static::doRegister($username, $email, $password);
        }
    }
}