<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class AdminContactController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Contact::inbox()->latest()->paginate(20),
        ]);
    }

    public function show(Contact $contact)
    {
        if (! $contact->is_read) {
            $contact->update(['is_read' => true]);
        }
        return response()->json(['data' => $contact]);
    }

    public function markRead(Contact $contact)
    {
        $contact->update(['is_read' => true]);
        return response()->json(['data' => $contact->fresh()]);
    }

    public function archive(Contact $contact)
    {
        $contact->update(['is_archived' => true]);
        return response()->json(['data' => $contact->fresh()]);
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return response()->json(['message' => 'Deleted.']);
    }
}
