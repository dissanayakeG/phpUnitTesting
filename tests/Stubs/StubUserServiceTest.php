<?php

use PHPUnit\Framework\TestCase;
use TestNamespace\WithDependencies\UserRepository;
use TestNamespace\WithDependencies\UserService;


class User
{
    private $id;
    private $name;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
}

class StubUserRepository extends UserRepository
{
    public function find($userId)
    {
        return new User(['id' => $userId, 'name' => 'John Doe']);
    }
}


class StubUserServiceTest extends TestCase
{
    public function testGetUserById_WithStub()
    {
        // Arrange
        $userRepository = new StubUserRepository();
        $userService = new UserService($userRepository);

        // Act
        $result = $userService->getUserById(1);

        // Assert
        $this->assertEquals('John Doe', $result->getName());
    }
}
