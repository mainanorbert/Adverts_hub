@extends('layouts.master')
@section('content')


    <script>

       const arr=[16,49,100,400]
       let sum=0

    //    arr.forEach(mySum);

    //    function mySum(item){
    //     sum+=item;
         
    //    }
    //    console.log(sum);

    //    const x=arr.map(Math.sqrt)

    //    console.log(x);
    // arr.forEach((num,i)=>{
    //     console.log([num,i]);

    // })

    // for(var i=0; i<arr.length;i++){
    //     console.log(arr);
    //     break
    // }

    const logNumber=(num)=>{
        console.log(num)
    }
    arr.forEach(num=>{
        logNumber(num);
    })

    // map function

    const myMap=arr.map(num=>num*2);
    console.log(myMap)

    let newArr=[]
    for(i=0;i<arr.length;i++){
        newArr[i]=arr[i]+4
    }
    console.log(newArr)

    const names=[
        {name:"Jane",age:30},
        {name:"Julius",age:40}
    ]

    let myname=names.map(name=>{
        return name.age
    })
       console.log(myname)
    </script>
@endsection