<?php

namespace Tests\Feature\Models;

use App\Models\Project;
use App\Queries\v1\ProjectQuery;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    public function test_project_creator_has_relation_with_users_table()
    {
        $project = Project::factory()->create();

        $this->assertEquals($project->creator_id, $project->creator->id);
    }

    public function test_project_owner_has_relation_with_users_table()
    {
        $project = Project::factory()->create();

        $this->assertEquals($project->owner_id, $project->owner->id);
    }
}
