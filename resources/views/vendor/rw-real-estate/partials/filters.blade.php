<section class="c-filters">
    <h2 class="c-filters__title">Filters:</h2>
    <label for="price_from">
        Price from: <input type="number" name="price_from" id="price_from"/>
    </label>
    <label for="price_to">
        Price To: <input type="number" name="price_to" id="price_to"/>
    </label>
    <br>
    <label for="rooms">
        Rooms:
        <select name="rooms" id="rooms">
            @for($i=1; $i<=10; $i++)
                <option value="{!! $i !!}">{!! $i !!}</option>
            @endfor
        </select>
    </label>
    <br>
    <label for="bathrooms">
        Bathrooms:
        <select name="bathrooms" id="bathrooms">
            @for($i=1; $i<=10; $i++)
                <option value="{!! $i !!}">{!! $i !!}</option>
            @endfor
        </select>
    </label>
    <br>
    <label for="property_type">
        Property Type:
        <select name="property_type" id="property_type">
            <option value="1">Semi Detached House</option>
            <option value="2">Apartment</option>
            <option value="3">Villa - Chalet</option>
            <option value="4">Cottage</option>
            <option value="5">Commercial</option>
            <option value="6">Plot</option>
        </select>
    </label>
    <br>
    <label for="location">
        Location:
        <select name="location" id="location">
            @foreach($locations as $location)
                <option value="{!! $location->id !!}">{!! $location->name !!}</option>
            @endforeach
        </select>
    </label>
    <br>
    <label for="garaje">
        Garaje:
        <input type="checkbox" name="garaje" id="garaje">
    </label>
    <br>
    <label for="garden">
        Garden:
        <input type="checkbox" name="garden" id="garden">
    </label>
    <br>
    <label for="private_pool">
        Private pool:
        <input type="checkbox" name="private_pool" id="private_pool">
    </label>
    <br>
    <label for="community_pool">
        Community pool:
        <input type="checkbox" name="community_pool" id="community_pool">
    </label>
    <br>
    <label for="reference">
        Reference:
        <input type="text" name="reference" id="reference">
    </label>
    <br>
    <input type="button" id="filter" value="Filter">
</section>

@push('css')
    <style>
        .c-filters {
            text-align: left;
            padding: 15px;
        }

        .c-filters__title {
            text-align: left;
        }
    </style>
@endpush

@push('js')
    <script>
        $(document).ready(function () {
            $('#filter').click(function () {
                $.ajax({
                    data: {
                        price_from: $('#price_from').val(),
                        price_to: $('#price_to').val(),
                        rooms: $('#rooms').val(),
                        bathrooms: $('#bathrooms').val(),
                        property_type: $('#property_type').val(),
                        location: $('#location').val(),
                        garaje: $('#garaje').prop('checked'),
                        garden: $('#garden').prop('checked'),
                        private_pool: $('#private_pool').prop('checked'),
                        community_pool: $('#community_pool').prop('checked'),
                        reference: $('#reference').val(),
                    },
                    success: function(response){
                        for(let i = 0; i < 20; i++) {
                            var $view = $('#property-' + i);
                            if (response[i]) {
                                $view.show();

                                const property = response[i];
                                console.log(property);
                                $view.find('h3').html(property.name);
                                $view.find('p').html(property.description);

                                $view.find('ul li:nth-child(1)').html('Price: ' + property.price + ' €');
                                $view.find('ul li:nth-child(2)').html('Location: ' + property.location);
                                $view.find('ul li:nth-child(3)').html('Rooms: ' + property.rooms);
                                $view.find('ul li:nth-child(4)').html('Bathrooms: ' + property.bathrooms);
                                $view.find('ul li:nth-child(5)').html('Built Area: ' + property.built_area + ' m2');
                            }
                            else {
                                $view.hide();
                            }
                        }
                    }
                });
            });

        });
    </script>
@endpush
