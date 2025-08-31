<?php
namespace App\Repositories;

use Illuminate\Support\Collection;
use App\Models\User;

interface UserRepositoryInterface
{
    public function getAdminUsers(): Collection;
    public function findByEmail(string $email): ?User;
    public function create(array $data): User;
}
