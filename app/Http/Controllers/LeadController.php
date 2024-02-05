<?php

namespace App\Http\Controllers;

use App\Models\{
    Lead,
    User
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    protected $lead;
    protected $user;

    public function __construct(Lead $lead, User $user)
    {
        $this->lead = $lead;
        $this->user = $user;
    }

    public function index(Lead $lead)
    {
        $leads = $lead->all();
        // dd($leads);
        return view('leads.index', compact('leads'));
    }

    public function show(string $id, Lead $lead)
    {
        // dd($lead);
        $lead = $lead->find($id);

        if (!$lead) {
            return redirect()->route('leads.index')->with('error', 'Lead não encontrado.');
        }

        return view('leads.show', compact('lead'));
    }

    public function store(Request $request, Lead $lead)
    {
        // $userId = Auth::id(); lógica para cadastrar um lead vinculado a um usuário

        $request->validate([
            'leadTitle' => 'required|string|max:255',
            'leadName' => 'required|string|max:255',
            'companyName' => 'string|max:255',
            'leadStage' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string|max:255',
        ]);

        $lead->leadTitle = $request->input('leadTitle');
        $lead->leadName = $request->input('leadName');
        $lead->companyName = $request->input('companyName');
        $lead->leadStage = $request->input('leadStage');
        $lead->price = $request->input('price');
        $lead->description = $request->input('description');
        // $lead->user_id = $userId;

        // toastr()->success('Lead criada com sucesso!');

        $lead->save();

        return redirect()->route('leads.index')->with('success', 'Lead criada com sucesso!');
    }

    public function create()
    {
        return view('leads.create');
    }

    public function edit(Lead $lead, string $id)
    {
        $lead = $lead->find($id);

        if (!$lead) {
            // toastr()->error('Falha ao encontrar o lead.');
            return redirect()->route('leads.index')->with('error', 'Falha ao encontrar o lead');
        }

        return view('leads.edit', compact('lead', 'id'));
    }

    public function update(Request $request, Lead $lead, string $id)
    {
        // $userId = Auth::id();

        $lead = $lead->find($id);

        if (!$lead) {
            // toastr()->error('Falha ao encontrar o lead.');
            return redirect()->route('leads.index')->with('error', 'Falha ao encontrar o lead');
        }

        $lead = Lead::find($id);

        $lead->leadTitle = $request->input('leadTitle');
        $lead->leadName = $request->input('leadName');
        $lead->companyName = $request->input('companyName');
        $lead->leadStage = $request->input('leadStage');
        $lead->price = $request->input('price');
        $lead->description = $request->input('description');
        // $lead->user_id = $userId;

        // toastr()->success('Lead atualizada com sucesso!');
        $lead->save();

        return redirect()->route('leads.index')->with('success', 'Lead atualizada com sucesso');
    }

    public function destroy(Lead $lead, string $id)
    {
        $lead = $lead->find($id);

        if (!$lead) {
            // toastr()->error('Falha ao encontrar o lead.');
            return redirect()->route('leads.index')->with('error', 'Falha ao encontrar o lead');
        }

        $lead->delete();

        // toastr()->success('Lead deletada com sucesso!');
        return redirect()->route('leads.index')->with('success', 'Lead deletada com sucesso');
    }
}
