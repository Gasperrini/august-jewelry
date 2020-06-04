<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Pradžia', route('home'));
});

// Home > About
Breadcrumbs::for('about', function ($trail) {
    $trail->parent('home');
    $trail->push('Apie mane', route('site.pages.about'));
});

// Home > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('home');
    $trail->push($category->name, route('category.show', $category->slug));
});

// Home > Blog > [Category] > [Product]
Breadcrumbs::for('product', function ($trail, $temp, $temp2) {
    if ($temp2->parent) {
        $trail->parent('category', $temp2);
    } else {
        $trail->parent('category');
    }

    $trail->push($temp->name, route('product.show', $temp->slug));
});