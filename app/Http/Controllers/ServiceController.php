<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Facility;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Facility $facility)
    {
        $services = $facility->services()->latest()->paginate(15);
        return view('services.index', compact('facility','services'));
    }

    public function create(Facility $facility)
    {
        return view('services.create', compact('facility'));
    }