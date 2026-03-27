<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('user')->latest()->get();
        return view('projects.index', compact('projects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
            'tech_stack' => 'nullable|string',
        ]);

        $request->user()->projects()->create($validated);

        return redirect(route('projects.index'))->with('success', 'Projeto registrado!');
    }

    public function destroy(Project $project)
{
    if ($project->user_id !== auth()->id()) {
        abort(403);
    }

    $project->delete();
    return back()->with('success', 'Registro excluído com sucesso!');
}

public function update(Request $request, Project $project)
{
    if ($project->user_id !== auth()->id()) {
        abort(403);
    }

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'status' => 'required|string',
        'tech_stack' => 'nullable|string',
    ]);

    $project->update($validated);
    return back()->with('success', 'Registro atualizado!');
}
}
