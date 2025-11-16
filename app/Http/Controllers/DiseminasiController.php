<?php

namespace App\Http\Controllers;

use App\Models\Riset;
use App\Models\Topic;
use App\Models\Visualization;
use App\Models\VisualizationType;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DiseminasiController extends Controller
{
    /**
     * Display the diseminasi form with all necessary data
     */
    public function index()
    {
        $risets = Riset::where('is_published', true)
            ->select('id', 'name', 'slug')
            ->orderBy('name')
            ->get();

        $visualizationTypes = VisualizationType::select('id', 'type_code', 'type_name')
            ->orderBy('type_name')
            ->get();

        return Inertia::render('Diseminasi/Index', [
            'risets' => $risets,
            'visualizationTypes' => $visualizationTypes,
        ]);
    }

    /**
     * Get topics based on selected riset
     */
    public function getTopics(Request $request)
    {
        $request->validate([
            'riset_id' => 'required|exists:risets,id'
        ]);

        $topics = Topic::where('riset_id', $request->riset_id)
            ->where('is_published', true)
            ->select('id', 'name', 'slug', 'order')
            ->orderBy('order')
            ->orderBy('name')
            ->get();

        return response()->json([
            'topics' => $topics
        ]);
    }

    /**
     * Store a new visualization
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'riset_id' => 'required|exists:risets,id',
            'topic_id' => 'required|exists:topics,id',
            'visualization_type_id' => 'required|exists:visualization_types,id',
            'title' => 'required|string|max:255',
            'interpretation' => 'required|string',
            'chart_data' => 'nullable|array',
            'chart_options' => 'nullable|array',
            'data_source' => 'nullable|string|max:255',
            'is_published' => 'boolean',
        ]);

        // Verify topic belongs to riset
        $topic = Topic::where('id', $validated['topic_id'])
            ->where('riset_id', $validated['riset_id'])
            ->firstOrFail();

        // Get the next order number for this topic
        $nextOrder = Visualization::where('topic_id', $validated['topic_id'])
            ->max('order') + 1;

        $visualization = Visualization::create([
            'topic_id' => $validated['topic_id'],
            'visualization_type_id' => $validated['visualization_type_id'],
            'title' => $validated['title'],
            'interpretation' => $validated['interpretation'],
            'chart_data' => $validated['chart_data'] ?? null,
            'chart_options' => $validated['chart_options'] ?? null,
            'data_source' => $validated['data_source'] ?? null,
            'order' => $nextOrder,
            'is_published' => $validated['is_published'] ?? false,
        ]);

        return redirect()->back()->with('success', 'Visualisasi berhasil disimpan.');
    }

    /**
     * Get all visualizations for display/management
     */
    public function list(Request $request)
    {
        $query = Visualization::with([
            'topic.riset',
            'type'
        ]);

        // Filter by riset if provided
        if ($request->has('riset_id') && $request->riset_id) {
            $query->whereHas('topic', function ($q) use ($request) {
                $q->where('riset_id', $request->riset_id);
            });
        }

        // Filter by topic if provided
        if ($request->has('topic_id') && $request->topic_id) {
            $query->where('topic_id', $request->topic_id);
        }

        // Filter by visualization type if provided
        if ($request->has('visualization_type_id') && $request->visualization_type_id) {
            $query->where('visualization_type_id', $request->visualization_type_id);
        }

        $visualizations = $query->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString()
            ->through(function ($viz) {
                return [
                    'id' => $viz->id,
                    'title' => $viz->title,
                    'interpretation' => Str::limit($viz->interpretation, 100),
                    'data_source' => $viz->data_source,
                    'is_published' => $viz->is_published,
                    'order' => $viz->order,
                    'created_at' => $viz->created_at->format('d M Y H:i'),
                    'riset' => [
                        'id' => $viz->topic->riset->id,
                        'name' => $viz->topic->riset->name,
                    ],
                    'topic' => [
                        'id' => $viz->topic->id,
                        'name' => $viz->topic->name,
                    ],
                    'type' => [
                        'id' => $viz->type->id,
                        'name' => $viz->type->type_name,
                        'code' => $viz->type->type_code,
                    ],
                ];
            });

        return Inertia::render('Diseminasi/List', [
            'visualizations' => $visualizations,
            'filters' => [
                'riset_id' => $request->riset_id,
                'topic_id' => $request->topic_id,
                'visualization_type_id' => $request->visualization_type_id,
            ],
        ]);
    }

    /**
     * Show edit form for visualization
     */
    public function edit($id)
    {
        $visualization = Visualization::with(['topic.riset', 'type'])->findOrFail($id);

        $risets = Riset::where('is_published', true)
            ->select('id', 'name', 'slug')
            ->orderBy('name')
            ->get();

        $topics = Topic::where('riset_id', $visualization->topic->riset_id)
            ->where('is_published', true)
            ->select('id', 'name', 'slug', 'order')
            ->orderBy('order')
            ->orderBy('name')
            ->get();

        $visualizationTypes = VisualizationType::select('id', 'type_code', 'type_name')
            ->orderBy('type_name')
            ->get();

        return Inertia::render('Diseminasi/Edit', [
            'visualization' => [
                'id' => $visualization->id,
                'title' => $visualization->title,
                'interpretation' => $visualization->interpretation,
                'chart_data' => $visualization->chart_data,
                'chart_options' => $visualization->chart_options,
                'data_source' => $visualization->data_source,
                'is_published' => $visualization->is_published,
                'riset_id' => $visualization->topic->riset_id,
                'topic_id' => $visualization->topic_id,
                'visualization_type_id' => $visualization->visualization_type_id,
            ],
            'risets' => $risets,
            'topics' => $topics,
            'visualizationTypes' => $visualizationTypes,
        ]);
    }

    /**
     * Update visualization
     */
    public function update(Request $request, $id)
    {
        $visualization = Visualization::findOrFail($id);

        $validated = $request->validate([
            'riset_id' => 'required|exists:risets,id',
            'topic_id' => 'required|exists:topics,id',
            'visualization_type_id' => 'required|exists:visualization_types,id',
            'title' => 'required|string|max:255',
            'interpretation' => 'required|string',
            'chart_data' => 'nullable|array',
            'chart_options' => 'nullable|array',
            'data_source' => 'nullable|string|max:255',
            'is_published' => 'boolean',
        ]);

        // Verify topic belongs to riset
        $topic = Topic::where('id', $validated['topic_id'])
            ->where('riset_id', $validated['riset_id'])
            ->firstOrFail();

        $visualization->update([
            'topic_id' => $validated['topic_id'],
            'visualization_type_id' => $validated['visualization_type_id'],
            'title' => $validated['title'],
            'interpretation' => $validated['interpretation'],
            'chart_data' => $validated['chart_data'] ?? null,
            'chart_options' => $validated['chart_options'] ?? null,
            'data_source' => $validated['data_source'] ?? null,
            'is_published' => $validated['is_published'] ?? false,
        ]);

        return redirect()->back()->with('success', 'Visualisasi berhasil diperbarui.');
    }

    /**
     * Delete visualization
     */
    public function destroy($id)
    {
        $visualization = Visualization::findOrFail($id);
        $visualization->delete();

        return redirect()->back()->with('success', 'Visualisasi berhasil dihapus.');
    }

    /**
     * Preview visualization data
     */
    public function preview(Request $request)
    {
        $validated = $request->validate([
            'riset_id' => 'required|exists:risets,id',
            'topic_id' => 'required|exists:topics,id',
            'visualization_type_id' => 'required|exists:visualization_types,id',
            'title' => 'required|string|max:255',
            'interpretation' => 'required|string',
            'chart_data' => 'nullable|array',
            'chart_options' => 'nullable|array',
        ]);

        $riset = Riset::findOrFail($validated['riset_id']);
        $topic = Topic::findOrFail($validated['topic_id']);
        $vizType = VisualizationType::findOrFail($validated['visualization_type_id']);

        return response()->json([
            'preview' => [
                'title' => $validated['title'],
                'interpretation' => $validated['interpretation'],
                'chart_data' => $validated['chart_data'] ?? [],
                'chart_options' => $validated['chart_options'] ?? [],
                'riset_name' => $riset->name,
                'topic_name' => $topic->name,
                'visualization_type' => $vizType->type_name,
            ]
        ]);
    }

    /**
     * Toggle publish status
     */
    public function togglePublish($id)
    {
        $visualization = Visualization::findOrFail($id);
        $visualization->is_published = !$visualization->is_published;
        $visualization->save();

        $status = $visualization->is_published ? 'dipublikasikan' : 'disembunyikan';

        return redirect()->back()->with('success', "Visualisasi berhasil {$status}.");
    }

    /**
     * Reorder visualizations within a topic
     */
    public function reorder(Request $request)
    {
        $validated = $request->validate([
            'topic_id' => 'required|exists:topics,id',
            'orders' => 'required|array',
            'orders.*.id' => 'required|exists:visualizations,id',
            'orders.*.order' => 'required|integer|min:0',
        ]);

        DB::transaction(function () use ($validated) {
            foreach ($validated['orders'] as $item) {
                Visualization::where('id', $item['id'])
                    ->where('topic_id', $validated['topic_id'])
                    ->update(['order' => $item['order']]);
            }
        });

        return redirect()->back()->with('success', 'Urutan visualisasi berhasil diperbarui.');
    }
}