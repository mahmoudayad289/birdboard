<?php

namespace Tests\Unit;

use App\Project;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_get_a_project_path()
    {
        $project = factory(Project::class)->create();

        $this->assertEquals(route('projects.show' , $project->id) , $project->path());
    }


    public function test_user_belongs_to_project()
    {

        $project = factory(Project::class)->create();

        $this->assertInstanceOf(User::class, $project->user);

    }
}
