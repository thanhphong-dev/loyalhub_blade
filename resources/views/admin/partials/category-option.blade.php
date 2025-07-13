<option value="{{ $category->id }}" 
    {{ isset($currentCategoryId) && $currentCategoryId == $category->id ? 'selected' : '' }}>
    {{ $prefix }}{{ $category->name }}
</option>

@if ($category->children->count() > 0)
    @foreach ($category->children as $childCategory)
        @include('admin.partials.category-option', [
            'category' => $childCategory,
            'prefix' => $prefix . '|--- ',
            'currentCategoryId' => $currentCategoryId ?? null,
        ])
    @endforeach
@endif
