
<x-layout>

  <div>
    <div class="" style="padding: 0 7px !important;">

      <form id="add-form" action="{{url('/edit-marker', $marker->id)}}" method="POST">
        
        <div>
          <a href="{{url('/markers')}}" class="text-success underline-none"><- Back</a>
        </div>

        @csrf

        @method('PUT')

        <h2 class="text-success text-center">Edit marker</h2>

        <div class="input-grp">
          <label for="lat">Latitude <span class="text-danger">*</span></label>
          <input name="lat" type="number" id="lat" step="0.000001" value="{{old('lat')? old('lat') : $marker->lat}}" placeholder="E.g 9.267722" required autofocus />
          @error('lat')
            <p class="text-danger">{{$message}}</p>
          @enderror
        </div>

        <div class="input-grp">
          <label for="lon">Longitude <span class="text-danger">*</span></label>
          <input name="lon" type="number" id="lon" step="0.000001" value="{{old('lon')? old('lon') : $marker->lon}}" placeholder="E.g 10.371834" required />
          @error('lon')
            <p class="text-danger">{{$message}}</p>
          @enderror
        </div>

        <div class="input-grp">
          <label for="init_zoom">Initial zoom level (Optional)</label>
          <input name="init_zoom" type="number" id="init_zoom" step="1" value="{{ old('int_zoom')? old('init_zoom') : $marker->init_zoom}}" />
          @error('int_zoom')
            <p class="text-danger">{{$message}}</p>
          @enderror
        </div>

        <div class="input-grp">
          <label for="popup">Popup (Optional)</label>
          <input name="popup" type="text" id="popup" value="{{old('popup')? old('popup') : $marker->popup}}" placeholder='E.g "Motor accident"' />
          @error('popup')
            <p class="text-danger">{{$message}}</p>
          @enderror
        </div>

        <div class="input-grp">
          <label for="tooltip">Tooltip (Optional)</label>
          <input name="tooltip" type="text" id="tooltip" value="{{old('tooltip')? old('tooltip') : $marker->tooltip}}" placeholder='E.g "A few were injured"' />
          @error('tooltip')
            <p class="text-danger">{{$message}}</p>
          @enderror
        </div>

        <div class="input-grp">
          <label for="description">Description (Optional)</label>
          <textarea name="description" id="description" class="w-100" value="" placeholder='Here you can write some notes about the incident of the marker..."' rows="5">{{old('description')? old('description') : $marker->description}}</textarea>
          @error('description')
            <p class="text-danger">{{$message}}</p>
          @enderror
        </div>

        <button type="submit" class="w-100 btn-success d-inline-block border-none" style="margin: 15px 0;">Edit</button>

      </form>

    </div>
  </div>
  
</x-layout>