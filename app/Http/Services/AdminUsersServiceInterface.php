<?php namespace App\Http\Services;

use Brackets\AdminAuth\Models\AdminUser;

interface AdminUsersServiceInterface
{
    public function getUserByEmail(string $email): AdminUser;
    public function existsEmail(string $email): bool;
    public function checkPassword(AdminUser $user, $password): bool;
}