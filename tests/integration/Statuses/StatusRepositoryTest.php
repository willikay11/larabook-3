<?php

use Larabook\Statuses\StatusRepository;

use Laracasts\TestDummy\Factory as TestDummy;

class StatusRepositoryTest extends \Codeception\TestCase\Test
{
    /**
     * @var \IntegrationTester
     */
    protected $tester;

    protected $repo;

    protected function _before()
    {
        $this->repo = new StatusRepository();
    }

    /** @test */
    public function it_gets_all_statuses_for_a_user()
    {
        //Given I have a user
        $users = TestDummy::times(2)->create('Larabook\Users\User');

        //And statuses for both of them
        TestDummy::times(2)->create('Larabook\Statuses\Status', [
            'user_id' => $users[0]->id,
            'body' => 'My Status'
        ]);

        TestDummy::times(2)->create('Larabook\Statuses\Status', [
            'user_id' => $users[1]->id,
            'body' => 'His status'
        ]);
        //When i fetch statuses for one user
        $statusesForUser = $this->repo->getAllForUser($users[0]);

        //Then I should receive only the relevant one
        $this->assertCount(2, $statusesForUser);
    }
    
    
    /** @test */

    public function it_save_a_statuse_for_a_user()
    {
        // Given I have an unsaved status
        $status = TestDummy::create('Larabook\Statuses\Status', [
            'user_id' => NULL,
            'body'    => 'My status'
        ]);

        // And an existing user
        $user = TestDummy::create('Larabook\Users\User');

        // When I try to persist this status
        $savedStatus = $this->repo->save($status, $user->id);
        // Then it should be saved

        $this->tester->seeRecord('statuses', [
            'body' => 'My status'
        ]);
        // And the status should have the correct user_id
        $this->assertEquals($user->id, $savedStatus->user_id);
    }
}