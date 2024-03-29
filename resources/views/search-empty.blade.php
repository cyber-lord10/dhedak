
<x-layout>

  <div>
    <div>
      <div style="">
        <form id="searchForm" style="padding: 6px 10px;">
          <input type="search" class="d-inline-block text-success" id="search" name="search" style=" width:calc(100% - 90px); padding:6px 9px; border-radius:7px; height:40px; font-size:22px; border:2px solid green;" value="{{$phrase??false}}" autofocus />
          <input type="submit" class="d-inline-block btn btn-success" value="Search"  style="padding:0 7px; font-size:19px; height:45px;">          
        </form>
      </div>
      <p class="search-error text-red-500 px-4" style="display: none;">Please write phrase to search for!</p>
    </div>

    <div>

      <div style="overflow-x: auto;">

        <table id="markers-table" class="w-100">

          <tr>
            <td colspan="7" class="text-danger" style="background-color:rgb(254, 203, 203); padding:35px 40px; text-align:center; font-size:40px; margin: 0; border:1px solid red;"><b>No phrase given</b><br><br> Please input a search phrase in the search field above or <a class="text-danger" href="{{url('/add')}}">add a marker</a>.</td>
          </tr>

        </table>

      </div>   

    </div>
  </div>


</x-layout>