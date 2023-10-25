<?php

namespace TestNamespace\WithDependencies;

class UserRepository
{
    public function find($userId)
    {
        return $userId;
    }

    public function save($userData)
    {
        return $userData;
    }
}
