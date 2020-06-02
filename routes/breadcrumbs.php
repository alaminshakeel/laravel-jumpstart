<?php

// Home
Breadcrumbs::for('admin.dash', function ($trail) {
    $trail->push('Home', route('admin.dash'));
});

// users breadcrumbs
Breadcrumbs::for('admin.users.index', function ($trail) {
    $trail->parent('admin.dash');
    $trail->push('User', route('admin.users.index'));
});

Breadcrumbs::for('admin.users.create', function ($trail) {
    $trail->parent('admin.dash');
    $trail->push('User', route('admin.users.index'));
    $trail->push('Create', route('admin.users.create'));
});

Breadcrumbs::for('admin.users.edit', function ($trail) {
    $trail->parent('admin.dash');
    $trail->push('User', route('admin.users.index'));
    $trail->push('Edit');
});

Breadcrumbs::for('admin.users.show', function ($trail) {
    $trail->parent('admin.dash');
    $trail->push('User', route('admin.users.index'));
    $trail->push('Show');
});

Breadcrumbs::for('csv-import', function ($trail) {
    $trail->parent('admin.dash');
    $trail->push('Import CSV');
});
