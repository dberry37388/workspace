<?php

namespace Tests\Feature\Api\v1;

use App\Http\Resources\Api\v1\ProjectResource;
use App\Http\Resources\Api\v1\ProjectResourceCollection;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Tests\TestCase;

class ProjectApiTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;
    protected array $payload;
    protected Project $project;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        $this->payload = Project::factory()->make([
            'creator_id' => $this->user->id,
            'owner_id' => $this->user->id,
        ])->toArray();

        $this->project = Project::factory()->create([
            'name' => 'Test Project',
            'key' => projectKeyGenerator('Test Project'),
            'creator_id' => $this->user->id,
            'owner_id' => $this->user->id
        ]);
    }

    // section List

    public function test_unauthenticated_user_may_not_list_projects()
    {
        $this->getJson(route('api.v1.projects.list'))
            ->assertUnauthorized();
    }

    public function test_unauthenticated_user_can_list_projects()
    {
        $this->actingAs($this->user);

        $response = $this->getJson(route('api.v1.projects.list'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'items' => [
                    '*' => [
                        'id',
                        'created_at',
                        'name',
                        'key',
                        'description',
                        'is_private',
                        'properties',
                        'creator_id',
                        'owner_id',
                        'updated_at',
                    ]
                ]
            ]);
    }

    // section Store
    public function test_unauthenticated_user_may_not_create_projects()
    {
        $this->postJson(route('api.v1.projects.store'), [])
            ->assertUnauthorized();
    }

    public function test_authenticated_user_can_create_projects()
    {
        $this->actingAs($this->user);

        $this->postJson(route('api.v1.projects.store', $this->payload))
            ->assertSuccessful()
            ->assertJson($this->payload);
    }

    // section Update
    public function test_unauthenticated_user_may_not_update_projects()
    {
        $project = Project::factory()->create($this->payload);

        $this->putJson(route('api.v1.projects.update', $project), [])
            ->assertUnauthorized();
    }

    public function test_authenticated_user_can_update_projects()
    {
        $this->actingAs($this->user);

        $payload = [
            'name' => 'My Updated Project Name',
            'key' => projectKeyGenerator('My Updated Project Name'),
        ];

        $this->patchJson(route('api.v1.projects.update', $this->project), [
            'name' => $payload['name'],
            'key' => $payload['key']
        ])
            ->assertSuccessful()
            ->assertJsonFragment([
                'key' => $payload['key'],
                'name' => $payload['name'],
            ]);
    }

    // section Delete Project

    public function test_unauthenticated_user_may_not_delete_projects()
    {
        $this->deleteJson(route('api.v1.projects.destroy', $this->project))
            ->assertUnauthorized();

        $this->assertDatabaseHas('projects', [
            'id' => $this->project->id
        ]);
    }
}
