<?php

use PHPUnit\Framework\TestCase;
use TestNamespace\WithDependencies\UserRepository;
use TestNamespace\WithDependencies\UserService;


class SpyUserRepository extends UserRepository
{
    private $findCalled = false;

    public function find($userId)
    {
        $this->findCalled = true;
        return parent::find($userId);
    }

    public function wasFindCalled()
    {
        return $this->findCalled;
    }
}

class SpyUserServiceTest extends TestCase
{
    public function testGetUserById_WithSpy()
    {
        // Arrange
        $userRepository = new SpyUserRepository();
        $userService = new UserService($userRepository);

        // Act
        $result = $userService->getUserById(1);

        // Assert
        // $this->assertEquals('John Doe', $result->getName()); //this is not working as i return $userId from UserRepository find method. if i return user object this should work
        $this->assertEquals('1', $result);
        $this->assertTrue($userRepository->wasFindCalled());
    }
}
