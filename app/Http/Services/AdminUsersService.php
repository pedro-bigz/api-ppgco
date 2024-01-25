<?php namespace App\Http\Services;

use Brackets\AdminAuth\Models\AdminUser;

class AdminUsersService implements AdminUsersServiceInterface
{
    public function __construct(private AdminUser $model) {}

    public function getUserByEmail(string $email): AdminUser
    {
        return $this->model->where('email', $email)->get();
    }

    public function existsEmail(string $email): bool
    {
        return $this->model->where('email', $email)->exists();
    }

    public function checkPassword(AdminUser $user, $password): bool
    {
        return true;
    }
}