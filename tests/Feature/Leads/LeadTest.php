<?php

namespace Tests\Feature\Leads;

use App\Models\{
    User,
    Lead
};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LeadTest extends TestCase
{

    use RefreshDatabase;
    use WithFaker;

    public function test_only_logged_user_can_see_leads(): void
    {
        $response = $this->get('/leads');

        $response->assertRedirect('/login');

        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get('/leads');

        $response->assertStatus(200);
    }

    public function test_store_method_creates_lead()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $leadData = Lead::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('leads.store'), $leadData);

        $response->assertRedirect(route('leads.index'));

        $this->assertDatabaseHas('leads', $leadData);
    }

    public function test_show_method_displays_lead()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $lead = Lead::factory()->create();

        $response = $this->get(route('leads.show', ['id' => $lead->id]));

        $response->assertStatus(200);

        $response->assertViewIs('leads.show');

        $response->assertViewHas('lead', $lead);
    }

    public function test_show_method_redirects_when_lead_not_found()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('leads.show', ['id' => 9999]));

        $response->assertRedirect(route('leads.index'));
    }

    public function test_update_method_updates_lead()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $lead = Lead::factory()->create();

        $newLeadData = [
            'leadTitle' => 'Este é um título',
            'leadName' => 'Alexandre Noguez',
            'companyName' => 'AlexCorp',
            'leadStage' => 'WaitingApproval',
            'price' => '100.50',
            'description' => 'Atualização da negociação'
        ];

        $response = $this->put(route('leads.update', ['id' => $lead->id]), $newLeadData);

        $response->assertRedirect(route('leads.index'));

        $this->assertDatabaseHas('leads', $newLeadData);

        $this->assertDatabaseMissing('leads', $lead->toArray());
    }

    public function test_destroy_method_deletes_lead_by_id()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $lead = Lead::factory()->create();

        $response = $this->delete(route('leads.destroy', ['id' => $lead->id]));

        $response->assertRedirect(route('leads.index'));

        $this->assertDatabaseMissing('leads', ['id' => $lead->id]);
    }
}
