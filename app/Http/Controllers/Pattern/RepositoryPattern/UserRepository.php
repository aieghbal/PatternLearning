<?php
interface UserRepositoryInterface {
    public function getActiveUsers();
}

class UserRepository implements UserRepositoryInterface {
    public function getActiveUsers() {
        return User::where('active', 1)->get();
    }
}
