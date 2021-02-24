<div class="c-properties-grid__item">
    <h3 class="c-properties-grid-item__title">{!! $property->name !!}</h3>
    <p>{!! $property->description !!}</p>
    <ul class="c-properties-grid-item__list">
        <li>Price: {!! $property->property_feature->price !!} €</li>
        <li>Location: {!! $property->location->name !!}</li>
        <li>Rooms: {!! $property->property_feature->bedrooms !!}</li>
        <li>Bathrooms: {!! $property->property_feature->bathrooms !!}</li>
        <li>Built Area: {!! $property->property_feature->built_area !!} m2</li>
    </ul>
</div>
