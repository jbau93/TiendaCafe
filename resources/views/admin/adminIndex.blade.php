@extends('admin.layoutAdmin')

@section('title', 'Index')

@section('content')
    <div class="panel shadow">
        <div class="header">
            <h1 class="title"><i class="fas fa-home"></i> Dashboard</h1>
        </div>
    </div>
    <div class="inside">
        The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
        Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which will toggle the menu when clicked.</p>
    </div>
    
@endsection
    