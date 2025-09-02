<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller{
     public function index()
    {
        $q        = request('q');            // free-text
        $type     = request('type');         // exact match
        $partner  = request('partner');      // exact match
        $cap      = request('capability');   // JSON contains (array column)

        $facilities = Facility::query()
            ->when($q, fn($qry) =>
                $qry->where(function ($w) use ($q) {
                    $w->where('name', 'like', "%{$q}%")
                      ->orWhere('description', 'like', "%{$q}%")
                      ->orWhere('location', 'like', "%{$q}%");
                })
            )
            ->when($type, fn($qry) => $qry->where('facility_type', $type))
            ->when($partner, fn($qry) => $qry->where('partner_organization', $partner))
            ->when($cap, fn($qry) => $qry->whereJsonContains('capabilities', $cap))
            ->latest()
            ->paginate(15)
            ->withQueryString();

        // For dropdown filters
        $types    = Facility::select('facility_type')->distinct()->pluck('facility_type')->filter()->values();
        $partners = Facility::select('partner_organization')->distinct()->pluck('partner_organization')->filter()->values();

        return view('facilities.index', compact('facilities','types','partners'));
    }
}