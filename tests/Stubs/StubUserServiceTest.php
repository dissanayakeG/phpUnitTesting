<?php

use PHPUnit\Framework\TestCase;
use TestNamespace\WithDependencies\UserRepository;
use TestNamespace\WithDependencies\UserService;
use Mockery as m;

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

//In this example, StubUserRepository is a subclass of UserRepository. It overrides the find method to always return a user with a predefined ID and name.
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

    //same test without subclass
    public function testGetUserById_WithStub2()
    {
        // Arrange
        $userRepository = m::mock(UserRepository::class);
        $userRepository->shouldReceive('find')->withArgs([1])->once()->andReturn(new User(['id' => 1, 'name' => 'John Doe']));
        $userService = new UserService($userRepository);

        // Act
        $result = $userService->getUserById(1);

        // Assert
        $this->assertEquals('John Doe', $result->getName());
    }
}
