@php
    
    $url = resource_path('views/OOP/data.json');
    $data = file_get_contents($url);
    $characters = json_decode($data, true);
    
    $url2 = resource_path('views/OOP/wizards.json');
    $data2 = file_get_contents($url2);
    $characters2 = json_decode($data2, true);
    
    foreach ($characters2 as $wizard) {
        echo $wizard['name'] . '\'s wand';
    }
    
    $data3 = ['name' => 'Alice', 'age' => 40];
    
    $mydata = json_encode($data3);
    echo $mydata;
    
@endphp


<table>
    <tr style="color: blue">
        <td>Name</td>
        <td>Race</td>
    </tr>
    @foreach ($characters as $character)
        <tr style="background-color: red">
            <td>{{ $character['name'] }}</td>
            <td>{{ $character['race'] }}</td>
        </tr>
    @endforeach
</table>

<script>
    // var data='';
    //     data=JSON.parse(data)
    //    for(i=0;i<data.length;i++){
    //     console.log('The name is '+data[i].name+ ' and age is '+data[i].age)
    //    }

    // Making json request from a file
    // var request=new XMLHttpRequest()

    // request.open('GET',"{{ asset('json/index1.json') }}",true)

    // request.onload=function(){
    //     var data=JSON.parse(this.response);
    //     for(i=0;i<data.length;i++){
    //         console.log('The name is '+data[i].name+' and age is '+data[i].age)
    //     }
    // }
    // request.send()

    // Retrieving data with API  using request

    var request = new XMLHttpRequest()
    request.open('GET', 'https://ghibliapi.herokuapp.com/films', true)
    request.onload = function () {
  // Begin accessing JSON data here
  var data = JSON.parse(this.response)

  if (request.status >= 200 && request.status < 400) {
    data.forEach(movie => {
      console.log(movie.title)
    })
  } else {
    console.log('error')
  }
}
    request.send()
</script>
