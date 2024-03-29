
<x-layout>

  <div id="trial"></div>

  {{-- @dd($json) --}}

  {{-- @DBUtilized() --}}
    <script>
      var data = JSON.parse(' {!! $json !!} ');
      console.log(data);
      if (data.action !== 'delete') {
        let $marker_id = data.data.marker_id;

        /** 
         * #1 Here you search your database collection for the item/record with the column/var marker_id == $marker_id
         * (Automatically you'll would get only one item from the database since the column is unique)
         * #2 You then delete that item/record from your DB
         * #3 That's all
         * #4 My route will automatically redirect you, or you yourself can ev redirect the user to the markers page,
         * #5 window.location.href = '/markers';  
        */
      } else {
        if (data.action === 'update') {
          let $marker_id = data.data.marker_id;
          // Here the data object I'll give to you will contain everything, so you'll update the item/record where the var/column is "update"
        } else {
          if (data.action === 'create') {
            // Heree you simply collect all the data and create a new item in the collection
          }
        }
        // Here the data object I'll give to you will contain everything, so you'll update the item/record where the var/column is "update"
      }
    </script>
  {{-- @endDBUtilized --}}


</x-layout>



