<?php

use PHPUnit\Framework\TestCase;
use Mockery as m;
use TestNamespace\WithDependencies\UserRepository;
use TestNamespace\WithDependencies\UserService;

class UserServiceTest extends TestCase
{
    protected $userRepository;

    protected function setUp(): void
    {
        // $this->userRepository = m::mock(UserRepository::class)->shouldReceive('find')->withArgs([1])->once()->andReturn('1')->getMock();
        $this->userRepository = m::mock(UserRepository::class);
    }

    protected function tearDown(): void
    {
        m::close();
    }

    public function testGetUserById()
    {
        $this->userRepository->shouldReceive('find')->withArgs([1])->once()->andReturn('1');

        $userService = new UserService($this->userRepository);
        $result = $userService->getUserById(1);
        $this->assertSame('1', $result);
    }

    public function testGetUserById_NotFound()
    {
        $this->userRepository->shouldReceive('find')->withArgs([1])->once()->andReturn(null);

        $userService = new UserService($this->userRepository);
        $result = $userService->getUserById(1);
        $this->assertSame(null, $result);
    }

    public function testUpdateUser()
    {
        $user = m::mock(User::class); //we can mock non existing classes too, We can use some random string instead of User as well.
        $user->shouldReceive('update')->once(); //we need this line as we call update method of user object from the UserService

        $this->userRepository->shouldReceive('find')->withArgs([1])->once()->andReturn($user);

        $userService = new UserService($this->userRepository);
        $result = $userService->updateUser(1, ['name' => 'jone']);

        $this->assertSame(true, $result);
    }

    public function testUpdateUser_UserNotFound()
    {
        $this->userRepository->shouldReceive('find')->withArgs([1])->once()->andReturn(null);

        $userService = new UserService($this->userRepository);
        $result = $userService->updateUser(1, ['name' => 'jone']);

        $this->assertSame(false, $result);
    }
}
