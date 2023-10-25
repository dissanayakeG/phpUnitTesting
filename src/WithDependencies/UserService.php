<?php

namespace TestNamespace\WithDependencies;

class UserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUserById($userId)
    {
        return $this->userRepository->find($userId);
    }

    public function updateUser($userId, $data)
    {
        $user = $this->userRepository->find($userId);
        if ($user) {
            $user->update($data);
            return true;
        }
        return false;
    }
}
