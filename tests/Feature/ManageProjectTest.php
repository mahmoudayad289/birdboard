<?php

namespace Tests\Feature;

use App\Project;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageProjectTest extends TestCase
{

    use WithFaker , RefreshDatabase;


    public function test_guests_cannot_control_to_project()
    {
        $this->get(route('projects.index'))->assertRedirect('login');
        $project = factory(Project::class)->create();
        $this->get($project->path())->assertRedirect('login');
        $this->post(route('projects.store') , $project->toArray())->assertRedirect('login');
    }

    public function test_only_auth_user_can_create_a_project() // make test for store data in database
    {

        $this->actingAs(factory(User::class)->create());
        $this->get(route('projects.create'))->assertStatus(200);

        $attributes = factory(Project::class)->raw();
        $this->post(route('projects.store') , $attributes)->assertRedirect(route('projects.index'));

        $this->get(route('projects.index'))->assertSee($attributes['title']);
    }

    public function test_a_user_can_view_a_project()
    {

        $this->be(factory(User::class)->create());
        $project = factory(Project::class)->create(['user_id' => auth()->user()->id]);

        $this->get(route('projects.show' , $project->id))
            ->assertSee($project->title)
            ->assertSee($project->description);
    }


    public function test_a_user_cannot_view_projects_of_others()
    {
        $this->be(factory(User::class)->create());
        $project = factory(Project::class)->create();

        $this->get($project->path())->assertStatus(403);

    }




    public function test_a_project_can_require_a_title()
    {
        $this->actingAs(factory(User::class)->create());
        $attributes = factory(Project::class)->raw(['title' => '']);
        $this->post(route('projects.store') , $attributes)->assertSessionHasErrors('title');
    }

    public function test_a_project_can_require_a_description()
    {
        $this->actingAs(factory(User::class)->create());
        $attributes = factory(Project::class)->raw(['description' => '']);
        $this->post(route('projects.store') , $attributes)->assertSessionHasErrors('description');
    }


}
