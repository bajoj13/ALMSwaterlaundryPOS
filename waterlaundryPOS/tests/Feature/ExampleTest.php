<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_redirected_to_login(): void
    {
        $response = $this->get(route('dashboard'));

        $response->assertRedirect(route('login'));
    }

    public function test_staff_can_sign_in_to_the_pos(): void
    {
        $user = User::factory()->create([
            'email' => 'staff@alms.com',
            'password' => 'password',
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertRedirect(route('dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_staff_cannot_access_admin_pages(): void
    {
        $staff = User::factory()->create(['role' => 'staff']);

        $this->actingAs($staff)->get(route('inventory'))->assertForbidden();
        $this->actingAs($staff)->get(route('reports'))->assertForbidden();
    }

    public function test_staff_can_view_all_orders(): void
    {
        $staff = User::factory()->create(['role' => 'staff']);

        $this->actingAs($staff)->get(route('orders'))->assertOk();
    }

    public function test_staff_can_view_a_paid_order_receipt(): void
    {
        $staff = User::factory()->create(['role' => 'staff']);

        $this->actingAs($staff)
            ->get(route('orders.receipt', 'L-1044'))
            ->assertOk()
            ->assertSee('Payment receipt')
            ->assertSee('PAID');
    }

    public function test_unpaid_order_receipts_are_not_available(): void
    {
        $staff = User::factory()->create(['role' => 'staff']);

        $this->actingAs($staff)->get(route('orders.receipt', 'L-1048'))->assertNotFound();
    }

    public function test_admin_can_access_inventory_and_reports(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($admin)->get(route('inventory'))->assertOk();
        $this->actingAs($admin)->get(route('reports'))->assertOk();
    }
}
