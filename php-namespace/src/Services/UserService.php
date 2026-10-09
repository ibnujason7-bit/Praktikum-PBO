<?php

namespace app\Services;

use app\Models\User;

class UserService {
    public function createUser(string $name, string $email): User {
        return new User($name, $email);
    }

    public function displayUser(User $user): string {
        return "Nama: " . $user->getName()
            . "<br>Email: " . $user->getEmail();
    }
}